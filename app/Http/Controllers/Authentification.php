<?php

namespace App\Http\Controllers;

use App\Mail\PasswordMail;
use App\Mail\UserMail;
use App\Mail\ContactMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Authentification extends Controller
{
    public function login(){
        return view('users.login');
    }

    public function edit($id){
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function forgotPass(){
        return view('users.forgot_password');
    }

    public function register(){
        return view('users.register');
    }

    protected function create(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'username' => 'required|string',
            'password' => 'required|string|min:8|max:15|confirmed',
            'phone' => 'required|string|max:20',
            'name' => 'required|string|max:255'
        ],[
            'email.required' => 'Vous devez remplir le champ email',
            'email.email' => 'Le champ email doit contenir un @ et .',
            'username.required' => 'Vous devez remplir le champ username',
            'username.string' => 'Le champ username ne prend que des chaines de caracteres',
            'password.required' => 'Vous devez remplir le champ password',
            'password.string' => 'Le champ password ne prend que des chaines de caracteres',
            'password.min' => 'Le champ password doit contenir au moins 8 caracteres',
            'password.max' => 'Le champ password ne doit pas depasser 15 caracteres',
            'password.confirmed' => 'Le champ password confirmation ne correspond pas',
            'phone.required' => 'Vous devez remplir le champ phone',
            'phone.string' => 'Le champ phone ne prend que des chaines de caracteres',
            'phone.max' => 'Le champ phone ne doit pas depasser 20 caracteres',
            'name.required' => 'Vous devez remplir le champ name',
            'name.string' => 'Le champ name ne prend que des chaines de caracteres',
            'name.max' => 'Le champ name ne doit pas depasser 255 caracteres'
        ]);
        if(request()->hasfile('profilePic')){
            $avatarName = time().'.'.request()->profilePic->getClientOriginalExtension();
            request()->profilePic->move(public_path('avatars'), $avatarName);
        }
        $token = Str::random(64);
        try{
            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'phone' => $request->phone,
                'role_id' => 3,
                'email' => $request->email,
                'profilePic' => '1725478994.png',
                'status' => 'pending',
                'token' => $token,
                'description' => $request->description ?? 'user',
                'password' => Hash::make($request->password),
                'motdepasse' => $request->password
            ]);

            $verification_link = url('registration/verification/'.$token.'/'.$request->email);
            $subject = 'Confirmation de compte - EDAAG TRADING';
    
            // Create a clean verification link without HTML for the email body
            $message = $verification_link;

            Mail::to($request->email)->send(new UserMail($subject, $message, $request->name));
            return back()->with('success', 'Utilisateur crée avec succès. Un email de confirmation a été envoyé.');

        }
        catch(\Exception $e) {
            return back()->with('fall', 'une erreur lors de lajout, voici le message : '.$e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        // Store whether this is the current user BEFORE any changes
        $isCurrentUser = Auth::check() && Auth::id() == $user->id;
        
        $user->name = $request->name;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->email = $request->email;
        
        if ($request->password != NULL) {
            $user->password = Hash::make($request->password);
            $passwordChanged = true;
        } else {
            $passwordChanged = false;
        }
        
        try {
            $user->update();
            
            // Get user name for personalization
            $userName = $user->name ?? $user->username ?? 'Utilisateur';
            
            // Send password change notification
            if (!empty($user->email) && $passwordChanged) {
                Mail::to($user->email)->send(new PasswordMail(
                    '🔐 Modification de votre mot de passe - EDAAG TRADING',
                    'Votre mot de passe a été modifié avec succès.',
                    $userName,
                    'changed'
                ));
            }
            
            // If this is the current user and password was changed, logout
            if ($isCurrentUser && $passwordChanged) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect()->route('accueil')->with('success', 'Votre profil a été mis à jour. Veuillez vous reconnecter.');
            }
            
            // Otherwise just redirect back with success
            return redirect()->back()->with('success', 'Utilisateur modifié avec succès.');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue: '.$e->getMessage());
        }
    }

    public function registration_verify($token, $email){
        $userExist = User::where('email', $email)->where('token', $token)->first();
        if(!$userExist){
            return redirect()->route('login')->with('fall', 'Utilisateur déjà activé ou n\'existe pas.');
        }else{
            $userExist->status = 'Active';
            $userExist->token = '';
            $userExist->update();
            return redirect()->route('login')->with('success', 'Utilisateur activé avec succès.');
        }

    }

    public function passwordRecovery(Request $request){
        // Deprecated insecure flow: send a standard reset link instead of emailing any password/hash.
        $request->validate(['email' => 'required|email']);
        Password::sendResetLink($request->only('email'));
        return redirect()->route('login')->with('success', 'Si votre email existe, un lien de réinitialisation a été envoyé.');
    }

    public function login_submit(Request $request){
        $identifier = trim((string) $request->email);
        $password = (string) $request->password;

        $user = User::where('email', $identifier)
            ->orWhere('username', $identifier)
            ->first();

        if (!$user) {
            return back()->with('fall', 'Utilisateur n\'existe pas');
        }

        $status = strtolower((string) $user->status);
        if ($status !== 'active') {
            return back()->with('fall', 'Votre compte n\'est pas activé.');
        }

        if (Auth::attempt(['email' => $user->email, 'password' => $password])) {
            return redirect()->route('home');
        }

        return back()->with('fall', 'Mot de passe incorrect.');
    }

    public function sendEmail(Request $request){
        $validated = $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);
        /* ,[
            'email.required' => 'Vous devez remplir le champ email',
            'email.email' => 'Le champ email doit contenir un @ et .',
            'name.required' => 'Vous devez remplir le champ name',
            'name.string' => 'Le champ name ne prend que des chaines de caracteres',
            'subject.required' => 'Vous devez remplir le champ subject',
            'subject.string' => 'Le champ subject ne prend que des chaines de caracteres',
            'message.required' => 'Vous devez remplir le champ message',
            'message.string' => 'Le champ message ne prend que des chaines de caracteres',
        ] */

        try {
            // Using ContactMail (recommended)
            Mail::to('edaagtrading0@gmail.com')->send(new ContactMail(
                $request->subject,
                $request->email,
                $request->name,
                $request->message
            ));
            
            // OR using UserMail (your existing)
            Mail::to('edaagtrading0@gmail.com')->send(new UserMail(
                $request->subject,
                "Email envoyeur: " . $request->email . "\n" .
                "Nom envoyeur: " . $request->name . "\n" .
                "Message: " . $request->message
            ));
            
            return back()->with('success', 'Votre message a été envoyé avec succès. Nous vous répondrons dans les plus brefs délais.');
            
        } catch (\Exception $e) {
            \Log::error('Contact email error: ' . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue. Veuillez réessayer plus tard.');
        }
    }


}
