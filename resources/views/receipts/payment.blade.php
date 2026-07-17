<div class="receipt-invoice-wrapper avoid-page-break has-watermark" id="receiptContent">

    <!-- Watermark -->
    <div class="document-watermark">
        {{ strtoupper($company?->name ?? 'SMH') }}
    </div>

    <!-- Header -->
    <div class="invoice-title-wrapper">
        <div class="invoice-title-row">
            <div class="invoice-logo">
                <img src="{{ asset('images/customers/logo.jpg') }}"
                     alt="{{ $company?->name ?? 'Logo' }}">
            </div>

            <div class="text-center flex-grow-1">
                <h1 class="invoice-title">REÇU DE PAIEMENT</h1>

                <h5>
                    REC-{{ date('Y') }}-{{ str_pad($payment->id, 6, '0', STR_PAD_LEFT) }}
                </h5>

                <span class="badge bg-success">
                    PAYÉ
                </span>
            </div>
        </div>

        <div class="invoice-subtitle">
            Original
        </div>
    </div>

    <!-- Company -->
    <div class="company-header">
        <h3>{{ $company?->name ?? 'SMH' }}</h3>

        <p>
            {{ $company?->address }}
        </p>

        <p>
            Tél : {{ $company?->phone }}
            |
            Email : {{ $company?->email }}
        </p>

        @if(!empty($company?->rccm))
            <p>
                RCCM : {{ $company->rccm }}
                |
                NIF : {{ $company->nif }}
            </p>
        @endif
    </div>

    <!-- Receipt Information -->
    <div class="invoice-number-section">
        <div class="invoice-number-row">

            <div>
                <strong>Reçu N° :</strong>
                #{{ $payment->receipt_number }}
            </div>

            <div>
                <strong>Date :</strong>
                {{ \Carbon\Carbon::parse($payment->created_at)->format('d/m/Y H:i') }}
            </div>

        </div>
    </div>

    <!-- Customer -->
    <div class="client-info-box">

        <h4>INFORMATIONS CLIENT</h4>

        <div class="client-info-row">
            <div>
                <strong>Nom :</strong>
                {{ $customer?->customerName }}
            </div>

            <div>
                <strong>Téléphone :</strong>
                {{ $customer?->phone }}
            </div>
        </div>

        <div class="client-info-row">
            <div>
                <strong>Adresse :</strong>
                {{ $customer?->address }}
            </div>
        </div>

    </div>

    <!-- Facture -->
    @if($facture)

    <div class="invoice-details">

        <div class="details-row">
            <span>Facture N°</span>
            <span>
                <strong>{{ $facture->numero_facture }}</strong>
            </span>
        </div>

        <div class="details-row">
            <span>Date Facture</span>
            <span>
                {{ $facture->created_at->format('d/m/Y') }}
            </span>
        </div>

    </div>

    @endif

    <!-- Paiement -->
    <table class="invoice-table">

        <thead>
            <tr>
                <th>N°</th>
                <th>DÉSIGNATION</th>
                <th>MODE</th>
                <th>RÉFÉRENCE</th>
                <th>MONTANT (GNF)</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>1</td>

                <td>
                    Paiement de la facture
                    {{ $facture?->numero_facture }}
                </td>

                <td>
                    {{ $payment->paid_by }}
                </td>

                <td>
                    {{ $payment->transaction_reference ?? '-' }}
                </td>

                <td>
                    {{ number_format($payment->versement,0,'.',' ') }}
                </td>
            </tr>
        </tbody>

        <tfoot>
            <tr class="invoice-total">
                <td colspan="4">
                    <strong>TOTAL PAYÉ</strong>
                </td>

                <td>
                    <strong>
                        {{ number_format($payment->versement,0,'.',' ') }}
                        GNF
                    </strong>
                </td>
            </tr>
        </tfoot>

    </table>

    <!-- Résumé -->
    @if($facture)

    <div class="invoice-details">

        <div class="details-row">
            <span>Montant Facture</span>

            <span>
                {{ number_format($facture->montant_total,0,'.',' ') }}
                GNF
            </span>
        </div>

        <div class="details-row">
            <span>Montant Payé</span>

            <span>
                {{ number_format($payment->versement,0,'.',' ') }}
                GNF
            </span>
        </div>

        <div class="details-row">
            <span>Reste à Payer</span>

            <span>
                <strong>
                    {{ number_format($payment->reste ?? $facture->reste,0,'.',' ') }}
                    GNF
                </strong>
            </span>
        </div>

    </div>

    @endif

    <!-- Montant en lettres -->
    <div class="amount-in-words">

        <h5>ARRÊTÉ LE PRÉSENT REÇU À LA SOMME DE :</h5>

        <strong>
            {{ ucfirst(numberToWords($payment->versement)) }}
            Francs Guinéens
        </strong>

    </div>

    <!-- Note -->
    <div class="alert alert-light mt-3">

        Ce reçu atteste la réception du montant indiqué ci-dessus.

        Toute contestation devra être formulée dans un délai de 7 jours.

    </div>

    <!-- Signatures -->
    <div class="signature-section">

        <div class="signature-box">
            <div class="signature-line"></div>

            <p>
                <strong>CLIENT</strong>
            </p>
        </div>

        <div class="signature-box">
            <div class="signature-line"></div>

            <p>
                <strong>
                    CAISSIER :
                    {{ auth()->user()->name ?? 'SMH' }}
                </strong>
            </p>
        </div>

    </div>

    <!-- QR Code -->
    @if(isset($qrCode))

        <div class="text-center mt-4">
            <img src="{{ $qrCode }}" width="100">
        </div>

    @endif

    <!-- Footer -->
    <div class="company-info">

        <h4>{{ $company?->name ?? 'SMH' }}</h4>

        <p>{{ $company?->address }}</p>

        <p>
            Tél :
            {{ $company?->phone }}
            |
            Email :
            {{ $company?->email }}
        </p>

        <p>
            Merci pour votre confiance.
        </p>

        <p>
            Généré le
            {{ now()->format('d/m/Y H:i') }}
        </p>

    </div>

</div>
