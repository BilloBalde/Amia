<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Rapport {{ ucfirst($period ?? '') }} - {{ $label ?? '' }}</title>

    <style>
        @page {
            margin: 25mm 35mm;
            size: A4;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', 'Helvetica', sans-serif;
            font-size: 10px;
            color: #1c2e5c;
            line-height: 1.4;
            background: #ffffff;
            padding: 5mm;
            padding-bottom: 80px;
        }
        
        /* Header 3 columns */
        .invoice-head-3col {
            display: table;
            width: 100%;
            table-layout: fixed;
            margin-bottom: 18px;
            border-bottom: 2px solid #1976d2;
            padding-bottom: 12px;
        }
        .invoice-head-left,
        .invoice-head-center,
        .invoice-head-right {
            display: table-cell;
            vertical-align: top;
            padding: 0 8px;
        }
        .invoice-head-left {
            width: 35%;
        }
        .invoice-head-center {
            width: 30%;
            text-align: center;
        }
        .invoice-head-right {
            width: 35%;
            text-align: right;
        }
        
        /* Logo agrandi et uniforme */
        .invoice-head-logo {
            width: 120px;
            height: 100px;
            object-fit: contain;
            flex-shrink: 0;
            border-radius: 6px;
        }
        
        .invoice-head-brand {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 5px;
            min-height: 100px;
            padding: 3px 0;
        }
        
        .invoice-head-brandtext {
            display: flex;
            flex-direction: column;
            gap: 5px;
            flex: 1;
        }
        
        .invoice-head-company {
            font-weight: 900;
            color: #1c2e5c;
            font-size: 19px;
            text-transform: uppercase;
            letter-spacing: 0.9px;
            line-height: 1.2;
            margin-bottom: 3px;
        }
        
        .invoice-head-sub {
            font-size: 10px;
            color: #5b667a;
            line-height: 1.4;
        }
        
        /* Style dynamique pour le titre selon la période */
        .invoice-head-title {
            font-weight: 900;
            font-size: 20px;
            letter-spacing: 1px;
            color: #1976d2;
            text-transform: uppercase;
            margin-bottom: 3px;
            line-height: 1.1;
        }
        
        /* Couleurs différentes selon la période */
        .invoice-head-title.daily {
            color: #2196F3;
        }
        .invoice-head-title.weekly {
            color: #4CAF50;
        }
        .invoice-head-title.monthly {
            color: #FF9800;
        }
        .invoice-head-title.annual {
            color: #F44336;
        }
        
        .invoice-head-period {
            font-size: 10px;
            font-weight: 700;
            color: #5c7db8;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 3px;
        }
        
        .invoice-head-original {
            font-size: 10px;
            font-weight: 700;
            color: #5c7db8;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 5px;
        }
        
        .invoice-head-clientname {
            font-weight: 800;
            color: #1c2e5c;
            font-size: 13px;
            margin-bottom: 3px;
            line-height: 1.2;
        }
        
        .invoice-head-clientline {
            font-size: 10px;
            color: #5b667a;
            line-height: 1.3;
        }
        
        /* Reste du CSS */
        .invoice-number-section {
            background: linear-gradient(135deg, #f7fbff 0%, #e3f2fd 100%);
            padding: 12px 10px;
            border: 1px solid #1976d2;
            border-left: 3px solid #1976d2;
            border-radius: 4px;
            margin-bottom: 18px;
        }
        
        .invoice-number-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .invoice-number-label {
            font-weight: 700;
            color: #5c7db8;
            margin-right: 5px;
            font-size: 10px;
        }
        
        .invoice-number-value {
            font-weight: 800;
            color: #1c2e5c;
            font-size: 11px;
        }
        
        /* Summary cards */
        .summary-grid {
            display: table;
            width: 100%;
            table-layout: fixed;
            margin-bottom: 22px;
            border-spacing: 8px;
        }
        
        .summary-row {
            display: table-row;
        }
        
        .summary-card {
            display: table-cell;
            padding: 14px 8px;
            border: 1px solid #e0e0e0;
            text-align: center;
            vertical-align: middle;
            background: #ffffff;
            border-radius: 4px;
        }
        
        .summary-card:first-child {
            border-left-color: #4caf50;
            background: linear-gradient(135deg, #f1f8f4 0%, #ffffff 100%);
        }
        
        .summary-card:nth-child(2) {
            border-left-color: #2196f3;
            background: linear-gradient(135deg, #e3f2fd 0%, #ffffff 100%);
        }
        
        .summary-card:nth-child(3) {
            border-left-color: #f44336;
            background: linear-gradient(135deg, #ffebee 0%, #ffffff 100%);
        }
        
        .summary-card:nth-child(4) {
            border-left-color: #ff9800;
            background: linear-gradient(135deg, #fff3e0 0%, #ffffff 100%);
        }
        
        .summary-card:nth-child(5) {
            border-left-color: #9c27b0;
            background: linear-gradient(135deg, #f3e5f5 0%, #ffffff 100%);
        }
        
        .summary-card:nth-child(6) {
            border-left-color: #00bcd4;
            background: linear-gradient(135deg, #e0f7fa 0%, #ffffff 100%);
        }
        
        .summary-card h3 {
            font-size: 11px;
            color: #1c2e5c;
            margin-bottom: 4px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        
        .summary-card .value {
            font-size: 15px;
            font-weight: 800;
            color: #1c2e5c;
            line-height: 1.2;
            margin-bottom: 3px;
        }
        
        .summary-card .sub-label {
            font-size: 9px;
            color: #5b667a;
            margin-top: 2px;
            font-weight: 600;
            line-height: 1.3;
        }
        
        /* Section title */
        .section-title {
            font-weight: 900;
            color: #1976d2;
            font-size: 14px;
            margin-bottom: 12px;
            margin-top: 18px;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding-bottom: 6px;
            border-bottom: 2px solid #1976d2;
        }
        
        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
            background: #ffffff;
            border: 1px solid #e0e0e0;
        }
        
        thead {
            display: table-header-group;
        }
        
        tbody {
            display: table-row-group;
        }
        
        table th {
            background: #1976d2 !important;
            background-color: #1976d2 !important;
            color: #ffffff !important;
            font-weight: 800;
            padding: 10px 6px;
            text-align: left;
            font-size: 11px;
            border: 1px solid #1565c0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: table-cell;
        }
        
        table th.text-right {
            text-align: right;
        }
        
        table td {
            padding: 10px 6px;
            border: 1px solid #e0e0e0;
            font-size: 10px;
            color: #1c2e5c;
            display: table-cell;
        }
        
        table td.text-right {
            text-align: right;
            font-weight: 600;
        }
        
        table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        
        .total-row {
            background: linear-gradient(135deg, #E7E6E6 0%, #d5d5d5 100%) !important;
            font-weight: 800;
        }
        
        .total-row td {
            border-top: 2px solid #1976d2;
            border-bottom: none;
            font-size: 11px;
            padding: 11px 6px;
            color: #1c2e5c;
        }
        
        /* Amount in words box */
        .amount-words-box {
            background: linear-gradient(135deg, #f7fbff 0%, #e3f2fd 100%);
            border: 2px solid #1976d2;
            border-radius: 4px;
            padding: 14px 12px;
            margin: 18px 0;
        }
        
        .amount-words-title {
            font-weight: 800;
            color: #1976d2;
            font-size: 11px;
            text-transform: uppercase;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }
        
        .amount-words-text {
            font-size: 11px;
            color: #1c2e5c;
            font-weight: 700;
            line-height: 1.5;
        }
        
        .montant-chiffres {
            font-size: 9px;
            margin-top: 5px;
            color: #5c7db8;
            font-style: italic;
        }
        
        /* Signature section */
        .signature-section {
            display: table;
            width: 100%;
            margin-top: 20px;
            margin-bottom: 18px;
            border-spacing: 12px;
        }
        
        .signature-left,
        .signature-right {
            display: table-cell;
            width: 50%;
            padding: 16px;
            border: 1px solid #e0e0e0;
            vertical-align: top;
            border-radius: 4px;
            background: #fafafa;
        }
        
        .signature-title {
            font-weight: 800;
            color: #1c2e5c;
            font-size: 11px;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        
        .signature-line {
            border-top: 1px solid #ddd;
            margin-top: 45px;
            padding-top: 6px;
            font-size: 10px;
            color: #5b667a;
            text-align: center;
        }
        
        /* Footer */
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            padding-top: 14px;
            border-top: 2px solid #1976d2;
            text-align: center;
            font-size: 10px;
            color: #5b667a;
            background: #f8f9fa;
            padding: 14px;
            border-radius: 4px 4px 0 0;
            margin: 0;
            box-sizing: border-box;
        }
        
        .footer-contact {
            margin-bottom: 6px;
            font-weight: 600;
            color: #1c2e5c;
        }
        
        .footer-thanks {
            font-weight: 700;
            color: #1976d2;
            margin-top: 8px;
            font-size: 11px;
            font-style: italic;
        }
        
        .footer-date {
            margin-top: 8px;
            font-size: 10px;
            color: #9e9e9e;
        }
        
        /* Badge de période */
        .period-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-left: 8px;
            vertical-align: middle;
        }
        
        .period-badge.daily {
            background-color: #2196F3;
            color: white;
        }
        
        .period-badge.weekly {
            background-color: #4CAF50;
            color: white;
        }
        
        .period-badge.monthly {
            background-color: #FF9800;
            color: white;
        }
        
        .period-badge.annual {
            background-color: #F44336;
            color: white;
        }
    </style>
</head>
<body>

    @php 
    
   
    
    // Récupérer les données de l'entreprise
        $company = \App\Models\Company::latest()->first();
        
        // Variables sécurisées avec des valeurs par défaut
        $period = $period ?? 'daily';
        $storeId = $storeId ?? null;
        $label = $label ?? '';
        $profit = $profit ?? 0;
        $totalVentes = $totalVentes ?? 0;
        $totalPayesVentes = $totalPayesVentes ?? 0;
        $totalEncaisse = $totalEncaisse ?? 0;
        $totalReste = $totalReste ?? 0;
        $totalAchats = $totalAchats ?? 0;
        $totalDepenses = $totalDepenses ?? 0;
        $breakdown = $breakdown ?? collect();
        $dailyExpenses = $dailyExpenses ?? collect();
        $stores = $stores ?? collect();

         // Filtrer les éléments null ou invalides
        $breakdown = $breakdown->filter(function ($item) {
            return is_array($item) || (is_object($item) && method_exists($item, 'toArray'));
        })->values();
        
        // Déterminer le titre selon la période (SANS TABLEAUX)
        $periodTitle = 'QUOTIDIEN';
        $subLabel = 'du jour';
        $badgeText = 'Quotidien';
        
        switch($period) {
            case 'daily':
                $periodTitle = 'QUOTIDIEN';
                $subLabel = 'du jour';
                $badgeText = 'Quotidien';
                break;
            case 'weekly':
                $periodTitle = 'HEBDOMADAIRE';
                $subLabel = 'de la semaine';
                $badgeText = 'Hebdo';
                break;
            case 'monthly':
                $periodTitle = 'MENSUEL';
                $subLabel = 'du mois';
                $badgeText = 'Mensuel';
                break;
            case 'annual':
                $periodTitle = 'ANNUEL';
                $subLabel = 'de l\'année';
                $badgeText = 'Annuel';
                break;
        }
        
        function nombreEnLettres($nombre) {
    if (!is_numeric($nombre)) {
        return "Montant invalide";
    }
    
    $nombre = intval($nombre);
    
    // Pour les cas simples ou si tu veux éviter les erreurs
    if ($nombre == 0) {
        return "zéro";
    }
    
    // Utilise une librairie externe ou une solution plus simple
    // Pour l'instant, retourne le nombre formaté
    return number_format($nombre, 0, ',', ' ') . " Francs Guinéens";
}
        
        // Convertir le profit en lettres
        $profitEnLettres = nombreEnLettres($profit);
    @endphp

    <div class="invoice-head-3col">
        <div class="invoice-head-left">
            <div class="invoice-head-brand">
                @if(file_exists(public_path('assets/img/logo.png')))
                    <img src="{{ public_path('assets/img/logo.png') }}" alt="{{ $company?->name ?? 'Logo' }}" class="invoice-head-logo">
                @endif
                <div class="invoice-head-brandtext">
                    <div class="invoice-head-company">{{ $company?->name ?? 'EDAAG TRADING' }}</div>
                    @if(!empty($company?->address))
                        <div class="invoice-head-sub">{{ $company->address }}</div>
                    @endif
                    @if(!empty($company?->phone))
                        <div class="invoice-head-sub">{{ $company->phone }}</div>
                    @endif
                    @if(!empty($company?->email))
                        <div class="invoice-head-sub">{{ $company->email }}</div>
                    @endif
                </div>
            </div>
        </div>

        <div class="invoice-head-center">
            <div class="invoice-head-title {{ $period }}">
                RAPPORT {{ $periodTitle }}
                <span class="period-badge {{ $period }}">{{ $badgeText }}</span>
            </div>
            <div class="invoice-head-period">
                Période: {{ $label }}
            </div>
            <div class="invoice-head-original">Original</div>
        </div>

        <div class="invoice-head-right">
            <div class="invoice-head-clientname">{{ $stores->firstWhere('id', $storeId)?->store_name ?? 'Toutes les boutiques' }}</div>
            <div class="invoice-head-clientline">Type: {{ ucfirst($period) }}</div>
            <div class="invoice-head-clientline">Généré le: {{ now()->format('d/m/Y H:i') }}</div>
        </div>
    </div>

    <div class="invoice-number-section">
        <div class="invoice-number-row">
            <div>
                <span class="invoice-number-label">Rapport N°:</span>
                <span class="invoice-number-value">#{{ strtoupper(substr($period, 0, 1)) }}R-{{ now()->format('YmdHis') }}</span>
            </div>
            <div>
                <span class="invoice-number-label">Période:</span>
                <span class="invoice-number-value">{{ $label }}</span>
            </div>
            <div>
                <span class="invoice-number-label">Généré le:</span>
                <span class="invoice-number-value">{{ now()->translatedFormat('d F Y, H:i') }}</span>
            </div>
        </div>
    </div>

    <div class="summary-grid">
        <div class="summary-row">
            <div class="summary-card">
                <h3>Ventes</h3>
                <div class="value">{{ number_format($totalVentes, 0, '.', ' ') }} FG</div>
                <div class="sub-label">Payé {{ $subLabel }}: {{ number_format($totalPayesVentes ?? 0, 0, '.', ' ') }} FG</div>
            </div>
            <div class="summary-card">
                <h3>Paiements encaissés</h3>
                <div class="value">{{ number_format($totalEncaisse, 0, '.', ' ') }} FG</div>
                <div class="sub-label">Période: paiements enregistrés</div>
            </div>
            <div class="summary-card">
                <h3>Non payé (reste)</h3>
                <div class="value">{{ number_format($totalReste, 0, '.', ' ') }} FG</div>
                <div class="sub-label">Dettes sur factures</div>
            </div>
        </div>
        <div class="summary-row">
            <div class="summary-card">
                <h3>Achats</h3>
                <div class="value">{{ number_format($totalAchats, 0, '.', ' ') }} FG</div>
                <div class="sub-label">Total achats (grand_total)</div>
            </div>
            <div class="summary-card">
                <h3>Dépenses</h3>
                <div class="value">{{ number_format($totalDepenses, 0, '.', ' ') }} FG</div>
                <div class="sub-label">Total dépenses</div>
            </div>
            <div class="summary-card">
                <h3>Solde (approx.)</h3>
                <div class="value">{{ number_format($profit, 0, '.', ' ') }} FG</div>
                <div class="sub-label">Ventes - Achats - Dépenses</div>
            </div>
        </div>
    </div>

    <div class="section-title">Détails par boutique</div>
    <table>
        <thead>
            <tr>
                <th>Boutique</th>
                <th class="text-right">Achats (FG)</th>
                <th class="text-right">Ventes (FG)</th>
                <th class="text-right">Paiements (FG)</th>
                <th class="text-right">Non payé (FG)</th>
                <th class="text-right">Dépenses (FG)</th>
                <th class="text-right">Solde (FG)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($breakdown as $row)
                @php
                    $storeName = $row['store']->store_name ?? 'N/A';
                    $achats = $row['achats'] ?? 0;
                    $ventes = $row['ventes'] ?? 0;
                    $encaisse = $row['encaisse'] ?? 0;
                    $reste = $row['reste'] ?? 0;
                    $depenses = $row['depenses'] ?? 0;
                    $profitRow = $row['profit'] ?? 0;
                @endphp
                <tr>
                    <td style="font-weight: 600;">{{ $storeName }}</td>
                    <td class="text-right">{{ number_format($achats, 0, '.', ' ') }}</td>
                    <td class="text-right">{{ number_format($ventes, 0, '.', ' ') }}</td>
                    <td class="text-right">{{ number_format($encaisse, 0, '.', ' ') }}</td>
                    <td class="text-right">{{ number_format($reste, 0, '.', ' ') }}</td>
                    <td class="text-right">{{ number_format($depenses, 0, '.', ' ') }}</td>
                    <td class="text-right" style="color: {{ $profitRow >= 0 ? '#4caf50' : '#f44336' }}; font-weight: 700;">
                        {{ number_format($profitRow, 0, '.', ' ') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center; padding: 20px; color: #9e9e9e;">Aucune donnée pour cette période.</td>
                </tr>
            @endforelse
            <tr class="total-row">
                <td><strong>TOTAL</strong></td>
                <td class="text-right"><strong>{{ number_format($totalAchats, 0, '.', ' ') }}</strong></td>
                <td class="text-right"><strong>{{ number_format($totalVentes, 0, '.', ' ') }}</strong></td>
                <td class="text-right"><strong>{{ number_format($totalEncaisse, 0, '.', ' ') }}</strong></td>
                <td class="text-right"><strong>{{ number_format($totalReste, 0, '.', ' ') }}</strong></td>
                <td class="text-right"><strong>{{ number_format($totalDepenses, 0, '.', ' ') }}</strong></td>
                <td class="text-right" style="color: {{ $profit >= 0 ? '#4caf50' : '#f44336' }};"><strong>{{ number_format($profit, 0, '.', ' ') }}</strong></td>
            </tr>
        </tbody>
    </table>

    <div class="amount-words-box">
        <div class="amount-words-title">Solde TOTAL EN LETTRES</div>
        <div class="amount-words-text">
            Arrêté à la somme de : <strong>{{ $profitEnLettres }} Francs Guinéens GNF</strong>
            <div class="montant-chiffres">
                (En chiffres : {{ number_format($profit, 0, ',', ' ') }} FG)
            </div>
        </div>
    </div>

    @if($dailyExpenses->count() > 0)
        @php
            // Adapter le titre selon la période
            $expenseTitle = 'Dépenses';
            if ($period === 'daily') {
                $expenseTitle = 'Dépenses quotidiennes';
            } elseif ($period === 'weekly') {
                $expenseTitle = 'Dépenses hebdomadaires';
            } elseif ($period === 'monthly') {
                $expenseTitle = 'Dépenses mensuelles';
            } elseif ($period === 'annual') {
                $expenseTitle = 'Dépenses annuelles';
            }
        @endphp
        
        <div class="section-title">{{ $expenseTitle }}</div>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th class="text-right">Nombre de dépenses</th>
                    <th class="text-right">Total {{ $period === 'daily' ? 'du jour' : 'de la période' }} (FG)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dailyExpenses as $dailyExpense)
                    @php
                        $dateObj = \Carbon\Carbon::parse($dailyExpense->expense_date ?? now());
                        $dayTotal = (float) ($dailyExpense->total_amount ?? 0);
                        $expenseCount = (int) ($dailyExpense->expense_count ?? 0);
                    @endphp
                    <tr>
                        <td style="font-weight: 600;">
                            @if($period === 'daily')
                                {{ $dateObj->translatedFormat('l d F Y') }}
                            @elseif($period === 'weekly')
                                Semaine du {{ $dateObj->format('d/m/Y') }}
                            @elseif($period === 'monthly')
                                {{ $dateObj->translatedFormat('F Y') }}
                            @else
                                {{ $dateObj->format('Y') }}
                            @endif
                        </td>
                        <td class="text-right">{{ $expenseCount }}</td>
                        <td class="text-right">{{ number_format($dayTotal, 0, '.', ' ') }}</td>
                    </tr>
                @endforeach
                <tr class="total-row">
                    <td><strong>TOTAL</strong></td>
                    <td class="text-right"><strong>{{ $dailyExpenses->sum('expense_count') }}</strong></td>
                    <td class="text-right"><strong>{{ number_format($dailyExpenses->sum('total_amount'), 0, '.', ' ') }}</strong></td>
                </tr>
            </tbody>
        </table>
    @endif

    <div class="signature-section">
        <div class="signature-left">
            <div class="signature-title">Cachet & Signature</div>
            <div class="signature-line">Nom et cachet</div>
        </div>
        <div class="signature-right">
            <div class="signature-title">Pour {{ $company?->name ?? 'EDAAG TRADING' }}</div>
            <div class="signature-line">Le Gérant/Signature autorisée</div>
            <div class="signature-line" style="margin-top: 8px;">Nom et signature du responsable</div>
        </div>
    </div>

    <div class="footer">
        @if(!empty($company?->address))
            <div class="footer-contact">{{ $company->address }}</div>
        @endif
        <div class="footer-thanks">Merci pour votre confiance et à bientôt!</div>
        <div class="footer-date">Rapport {{ $period }} généré le {{ now()->format('d/m/Y H:i') }}</div>
    </div>
</body>
</html>