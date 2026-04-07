<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Dette;

use Illuminate\Http\Request;

class DetteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.check');
    }
    
    public function index(Request $request)
    {
        $customers = Customer::all();
        $query = Dette::query();

        if ($request->filled('reference')) {
            $query->where('reference', 'like', '%' . $request->input('reference') . '%');
        }

        if ($request->filled('customer_id')) {
            $query->where('customer_id', 'like', '%' . $request->input('customer_id') . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', 'like', '%' . $request->input('status') . '%');
        }

        if ($request->filled('endettement_date')) {
            $query->where('endettement_date', 'like', '%' . $request->input('endettement_date') . '%');
        }

        if (auth()->user()->role_id == 3) {
            $dataTable = $query->where('store_id', Store::where('user_id', auth()->user()->id)->first()->id)->get();
        } else {
            $dataTable = $query->get();
        }

        return view('dettes.index', compact('dataTable', 'customers'));
    }
    
    public function create()
    {
        $customers = Customer::all();
        $stores = Store::all();
        $reference = 'DETTE'.Carbon::now()->format('Ym').'-'.str_pad(Dette::count() + 1, 4, '0', STR_PAD_LEFT);
        return view('dettes.create', compact('customers', 'stores', 'reference'));
    }
    
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'reference' => 'required|unique:dettes',
            'customer_id' => 'required',
            'montant_total' => 'required|numeric',
            'montant_paid' => 'required|numeric',
            'notes' => 'nullable|string',
        ],[
            'reference.required' => 'Le champ numéro de la reference est obligatoire',
            'numero_facture.unique' => 'Le champ numéro de la reference doit être unique',
            'customer_id.required' => 'Veuillez selectionner le client',
            'montant_total.required' => 'Veuillez entrer un montant, à la rigueure 0',
        ]);

        if (isset($request->customerName) && isset($request->mark) && isset($request->tel) && isset($request->address)) {
            $customer = Customer::create([
                'customerName' => $request->customerName,
                'mark' => $request->mark,
                'tel' => $request->tel,
                'address' => $request->address,
            ]);

            $customer_id = $customer->id;
        }
        try {
            Dette::create([
                'reference' => $request->reference,
                'store_id' => $request->store_id,
                'customer_id' => $customer_id ?? $request->customer_id,
                'montant_total' => $request->montant_total,
                'montant_paid' => $request->montant_paid,
                'reste' => $request->montant_total - $request->montant_paid,
                'notes' => $request->notes,
                'status' => ($request->montant_total - $request->montant_paid) == 0 ? 'paid' : 'pending',
                'endettement_date' => $request->endettement_date,
            ]);
            $sms = "Dette enregistrée avec succès";
            $countCustomerInvoices = Facture::where('customer_id', $request->customer_id)->count();
            // Redirect back with a success message
            return back()->with('success'=>$sms);
        } catch (\Throwable $th) {
            return back()->with('fall', 'une erreur lors de l\'engristrement, voici le message : '.$th->getMessage());
        }
    }
}
