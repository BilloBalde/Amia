<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<head>
    <link rel="stylesheet" href="{{ asset('assets/css/invoice-details.css') }}">
   
    <style>
        .page-btn {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 15px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
        }
        
        .btn i {
            margin-right: 5px;
        }
        
        .btn-added {
            background-color: #ff9f43;
            color: white;
        }
        
        .btn-added:hover {
            background-color: #ff820e;
        }
        
        .btn-cancel {
            background-color: #6c757d;
            color: white;
        }
        
        .btn-cancel:hover {
            background-color: #5a6268;
        }
        /* Filigrane facture (logo + texte) */
        #invoiceContent{
            position: relative;
            overflow: hidden;
            color: #000000 !important; /* Force tout le texte en noir */
        }
        
        /* Force tous les éléments texte en noir */
        #invoiceContent,
        #invoiceContent *,
        #invoiceContent h1,
        #invoiceContent h2,
        #invoiceContent h3,
        #invoiceContent h4,
        #invoiceContent h5,
        #invoiceContent h6,
        #invoiceContent p,
        #invoiceContent span,
        #invoiceContent div,
        #invoiceContent strong,
        #invoiceContent em,
        #invoiceContent table,
        #invoiceContent th,
        #invoiceContent td,
        #invoiceContent a,
        #invoiceContent .invoice-head-company,
        #invoiceContent .invoice-head-title,
        #invoiceContent .invoice-head-clientname,
        #invoiceContent .invoice-number-label,
        #invoiceContent .invoice-number-value,
        #invoiceContent .client-info-box,
        #invoiceContent .amount-in-words,
        #invoiceContent .signature-box,
        #invoiceContent .company-info {
            color: #000000 !important;
        }
        .signature-box{
            min-height: 150px !important;
        }
        /* Enlever les backgrounds bleus des en-têtes de tableau */
        .invoice-products-table thead th{
            background: #f2f4f7 !important;
            color: #000000 !important; /* Changé de #1c2e5c à noir */
            border-color: #cccccc !important;
        }
        
        /* S'assurer que les bordures restent visibles */
        .invoice-table td,
        .invoice-table th {
            border-color: #333333 !important;
        }
        
        .invoice-watermark{
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 0;
        }
        .invoice-watermark .watermark-logo{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); 
            width: 280px;
            max-width: 70%;
            height: auto;
            opacity: 0.26;
        }

        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
            gap: 20px;
            flex-wrap: wrap; /* This allows wrapping on mobile */
        }

        .signature-box {
            flex: 1 1 200px; /* Flex-grow, flex-shrink, flex-basis */
            min-width: 200px;
            text-align: center;
            page-break-inside: avoid !important;
            break-inside: avoid !important;
            margin-bottom: 20px;
        }

        .signature-line {
            width: 100%;
            margin-bottom: 10px;
        }

        .signature-box p {
            margin: 5px 0 0 0;
            font-size: 12px;
        }
        
        /* Nouveaux styles pour améliorer la gestion des sauts de page */
        .invoice-products-table,
        .amount-in-words,
        .signature-section,
        .company-info {
            page-break-inside: avoid;
        }

        .company-info {
            page-break-before: avoid;
            margin-top: 20px;
        }
        
        /* Styles pour l'impression */
        @media print {
            /* Cacher les éléments d'interface */
            #global-loader,
            .header,
            .sidebar,
            .page-header,
            .no-print {
                display: none !important;
            }
            
         

            /* Forcer tous les conteneurs à fond blanc */
            body,
            .main-wrapper,
            .page-wrapper,
            .content,
            .card,
            .card-body,
            #invoiceContent {
                background: white !important;
                margin: 0 !important;
                padding: 0 !important;
                box-shadow: none !important;
                border: none !important;
                width: 100%;
            }
            
            .main-wrapper,
            .page-wrapper,
            .content,
            .card,
            .card-body {
                padding: 0;
                margin: 0;
                background: white;
                box-shadow: none;
                border: none;
                width: 100%;
            }
            
            #invoiceContent {
                padding: 15px;
                margin: 0;
            }
            
            .invoice-products-table {
                width: 100%;
                border-collapse: collapse;
            }

            .invoice-products-table thead {
                display: table-header-group;
            }

            .invoice-products-table tfoot {
                display: table-footer-group;
            }

            .invoice-products-table tr {
                page-break-inside: avoid;
            }

            .signature-section {
                page-break-inside: avoid;
            }
        }
    </style>
</head>
<body>
    <div id="global-loader">
        <div class="whirly-loader"></div>
    </div>

    <div class="main-wrapper">
        @include('layouts.header')
        @include('layouts.sidebar')

        <div class="page-wrapper">
            <div class="content">
                <div class="page-header no-print">
                    <div class="page-title">
                        <h4>Détails de Vente</h4>
                        <h6>Voir les détails de vente</h6>
                    </div>
                    <div class="page-btn">
                        <button id="printInvoice" class="btn btn-added" title="Imprimer">
                            <i class="fas fa-print me-2"></i> Imprimer
                        </button>
                        <button id="downloadPdf" class="btn btn-added" title="Télécharger en PDF">
                            <i class="fas fa-file-pdf me-2"></i> Télécharger PDF
                        </button>
                        <a href="{{ route('factures.index') }}" class="btn btn-cancel">
                            <i class="fas fa-arrow-left me-2"></i> Retour
                        </a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        @php
                            $company = \App\Models\Company::latest()->first();
                        @endphp

                        <div class="receipt-invoice-wrapper" id="invoiceContent">
                            <div class="invoice-watermark" aria-hidden="true">
                                <!-- <img class="watermark-logo" src="{{ asset('assets/img/logo.png') }}" alt=""> -->
                            </div>

                            <div class="invoice-title-wrapper">
                                <div class="invoice-head-3col">
                                    <div class="invoice-head-left">
                                        <div class="invoice-head-brand">
                                            <img src="{{ asset('assets/img/logo.png') }}" alt="{{ $company?->name ?? 'Logo' }}" class="invoice-head-logo">
                                            <div class="invoice-head-brandtext">
                                                <div class="invoice-head-company">{{ $company?->name ?? 'EDAAG TRADING' }}</div>
                                                @if(!empty($company?->address))
                                                    <div class="invoice-head-sub">{{ $company->address }}</div>
                                                @endif
                                                @if(!empty($company?->phone))
                                                    <div class="invoice-head-sub">{{ $company->phone }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="invoice-head-center">
                                        <div class="invoice-head-title">FACTURE D'ACHAT</div>
                                        <div class="invoice-head-original">Original</div>
                                    </div>

                                    <div class="invoice-head-right">
                                        <div class="invoice-head-clientname">{{ $customer->customerName ?? 'Client' }}</div>
                                        @if(!empty($customer->tel))
                                            <div class="invoice-head-clientline">{{ $customer->tel }}</div>
                                        @endif
                                        @if(!empty($customer->address))
                                            <div class="invoice-head-clientline">{{ $customer->address }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="invoice-number-section">
                                <div class="invoice-number-row">
                                    <div>
                                        <span class="invoice-number-label">Facture N°:</span>
                                        <span class="invoice-number-value">#{{ $facture }}</span>
                                    </div>
                                    <div>
                                        <span class="invoice-number-label">Date:</span>
                                        <span class="invoice-number-value">{{ \Carbon\Carbon::parse($laFacture->created_at)->format('d/m/Y H:i') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="client-info-box">
                                <div class="client-info-row">
                                    <div><strong>Boutique:</strong> {{ $laFacture->store?->description ?? $laFacture->store?->store_name ?? 'N/A' }}</div>
                                    <div><strong>Gérant:</strong> {{ auth()->user()->name }}</div>
                                </div>
                                <div class="client-info-row">
                                    <div><strong>Client:</strong> {{ $customer->customerName ?? 'N/A' }}</div>
                                    <div><strong>Téléphone:</strong> {{ $customer->tel ?? 'N/A' }}</div>
                                </div>
                                <div class="client-info-row">
                                    <div><strong>Adresse:</strong> {{ $customer->address ?? 'N/A' }}</div>
                                    <div>
                                        <strong>Statut Paiement:</strong>
                                        {{ $laFacture->statut ?? 'N/A' }}
                                        &nbsp;|&nbsp;
                                        <strong>Livraison:</strong>
                                        {{ $laFacture->livraison == 'livré' ? 'Livré' : 'Non livré' }}
                                    </div>
                                </div>
                            </div>

                            <table class="invoice-table invoice-products-table">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Produit</th>
                                        <th>Quantité</th>
                                        <th>Prix Unitaire</th>
                                        <th>Montant Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoice as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->produit }}</td>
                                            <td>{{ $item->quantity }} PCS</td>
                                            <td>{{ numberDelimiter($item->prix) }} FG</td>
                                            <td>{{ numberDelimiter($item->prixTotal) }} FG</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="invoice-total">
                                        <td colspan="4"><strong>GRAND TOTAL</strong></td>
                                        <td><strong>{{ numberDelimiter($laFacture->montant_total) }} FG</strong></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="amount-in-words">
                                <strong>MONTANT EN LETTRES</strong><br>
                                <em>
                                    Arrêtée à la somme de :
                                    {{ ucfirst(numberToWords($laFacture->montant_total)) }} Francs Guinéens GNF
                                </em>
                            </div>

                            <div class="signature-section">
                                <div class="signature-box">
                                    <div class="signature-line"></div>
                                    <p><strong>SIGNATURE DU CLIENT</strong></p>
                                </div>

                                <div class="signature-box">
                                    <div class="signature-line"></div>
                                    <p><strong>POUR {{ strtoupper($company?->name ?? 'EDAAG TRADING') }}</strong></p>
                                </div>
                            </div>

                            <div class="company-info">
                                <h4>{{ $company?->name ?? 'EDAAG TRADING' }}</h4>
                                <p>{{ $company?->address ?? '' }}</p>
                                <p>Tél: {{ $company?->phone ?? '+224 610050512/ 661515196/ 623523654' }} | Email: {{ $company?->email ?? 'edaagtrading0@gmail.com' }}</p>
                                <p>Reçu/Facture généré le {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const downloadBtn = document.getElementById('downloadPdf');
            const printBtn = document.getElementById('printInvoice');
            const element = document.getElementById('invoiceContent');

            if (!downloadBtn || !element || !printBtn) return;

            // Gestionnaire pour le bouton Imprimer
            printBtn.addEventListener('click', function(e) {
                e.preventDefault();
                window.print();
            });

            // Gestionnaire pour le bouton PDF
            downloadBtn.addEventListener('click', function(e) {
                e.preventDefault();

                const btn = downloadBtn;
                const originalText = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Génération...';
                btn.disabled = true;

                // Options de génération PDF
                const opt = {
                    margin: [10, 10, 15, 10], // top, right, bottom, left (mm) - plus d'espace en bas
                    filename: 'Facture_{{ $facture }}.pdf',
                    image: { type: 'jpeg', quality: 0.98 },
                    html2canvas: {
                        scale: 2,
                        useCORS: true,
                        scrollY: 0
                    },
                    jsPDF: {
                        unit: 'mm',
                        format: 'a4',
                        orientation: 'portrait'
                    },
                    pagebreak: {
                        mode: ['css', 'legacy']  // ← Suppression de 'avoid-all' pour permettre les sauts de page
                    }
                };

                html2pdf()
                    .set(opt)
                    .from(element)
                    .save()
                    .then(() => {
                        btn.innerHTML = originalText;
                        btn.disabled = false;
                    })
                    .catch(() => {
                        btn.innerHTML = originalText;
                        btn.disabled = false;
                    });
            });
        });
    </script>
</body>
</html>