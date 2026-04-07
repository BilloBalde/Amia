<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rapport des mouvements - {{ $company->name ?? config('app.name') }}</title>
    <style>
        /* ===== RESET & TYPOGRAPHIE ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', 'Helvetica', 'Arial', sans-serif;
            font-size: 10pt;
            line-height: 1.5;
            color: #1e293b;
            background: white;
            padding: 0.8cm;
        }

        .wrapper {
            max-width: 100%;
            margin: 0 auto;
        }

        /* ===== EN-TÊTE ===== */
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 4px solid #2563eb;
        }

        .logo {
            flex: 0 0 80px;
            max-width: 80px;
        }

        .logo img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .company-info {
            flex: 1;
            text-align: center;
            padding: 0 15px;
        }

        .company-info h1 {
            font-size: 18pt;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 4px;
            letter-spacing: 0.5px;
        }

        .company-info p {
            font-size: 9pt;
            color: #475569;
            margin: 2px 0;
        }

        .report-info {
            flex: 0 0 200px;
            text-align: right;
            font-size: 9pt;
            background: #f8fafc;
            padding: 8px 12px;
            border-radius: 6px;
            border-left: 4px solid #2563eb;
        }

        .report-info p {
            margin: 4px 0;
            color: #1e293b;
        }

        .report-info strong {
            color: #2563eb;
        }

        .admin-badge {
            background: #2563eb;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 8pt;
            font-weight: 600;
            display: inline-block;
            margin-top: 4px;
        }

        /* ===== TITRE DU RAPPORT ===== */
        .title-section {
            text-align: center;
            margin: 25px 0 15px;
        }

        .title-section h2 {
            font-size: 16pt;
            font-weight: 700;
            color: #0f172a;
            text-transform: uppercase;
            margin-bottom: 6px;
            letter-spacing: 1.5px;
        }

        .filters {
            background: #f1f5f9;
            display: inline-block;
            padding: 6px 18px;
            border-radius: 30px;
            font-size: 9pt;
            color: #1e293b;
        }

        .filters strong {
            color: #2563eb;
        }

        /* ===== CARTES RÉCAPITULATIVES ===== */
        .summary-grid {
            display: table;
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        .summary-card {
            display: table-cell;
            padding: 14px 8px;
            text-align: center;
            background: white;
            border: 1px solid #e2e8f0;
        }

        .summary-card .label {
            font-size: 9pt;
            text-transform: uppercase;
            font-weight: 600;
            color: #64748b;
            margin-bottom: 6px;
            letter-spacing: 0.5px;
        }

        .summary-card .value {
            font-size: 16pt;
            font-weight: 800;
            line-height: 1.2;
        }

        .summary-card.ventes { border-top: 5px solid #22c55e; }
        .summary-card.achats { border-top: 5px solid #eab308; }
        .summary-card.depenses { border-top: 5px solid #ef4444; }
        .summary-card.solde { border-top: 5px solid #3b82f6; }

        .text-success { color: #16a34a; }
        .text-danger { color: #dc2626; }
        .text-warning { color: #ca8a04; }
        .text-primary { color: #2563eb; }

        /* ===== TABLEAU DES MOUVEMENTS ===== */
        .movements-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
            font-size: 9pt;
            border-radius: 8px;
            overflow: hidden;
        }

        .movements-table th {
            background: #1e293b;
            color: white;
            padding: 10px 6px;
            font-weight: 600;
            text-align: center;
            border: none;
            font-size: 9pt;
            letter-spacing: 0.3px;
        }

        .movements-table td {
            padding: 8px 6px;
            border: 1px solid #e2e8f0;
            vertical-align: middle;
        }

        .movements-table tr:nth-child(even) {
            background-color: #f8fafc;
        }

        .movements-table tr:hover {
            background-color: #f1f5f9;
        }

        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 8pt;
            font-weight: 700;
            text-transform: uppercase;
            color: white;
            text-align: center;
            min-width: 70px;
        }

        .badge.vente { background: #16a34a; }
        .badge.achat { background: #ca8a04; }
        .badge.depense { background: #dc2626; }
        .badge.autre { background: #64748b; }

        .total-row {
            background: #f1f5f9 !important;
            font-weight: 700;
            border-top: 2px solid #2563eb;
        }

        .total-row td {
            padding: 10px 6px;
            background: #e2e8f0;
        }

        .nowrap {
            white-space: nowrap;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
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
        

        /* ===== UTILITAIRES ===== */
        .empty-message {
            padding: 30px;
            text-align: center;
            background: #f8fafc;
            border-radius: 8px;
            color: #475569;
            font-style: italic;
            border: 1px dashed #94a3b8;
        }
    </style>
</head>
<body>
{{-- ======================================== --}}
{{-- EN-TÊTE : LOGO + SOCIÉTÉ + INFOS RAPPORT --}}
{{-- ======================================== --}}
<div class="header" style="display: table; width: 100%; margin-bottom: 20px; padding-bottom: 12px; border-bottom: 4px solid #2563eb;">
    
    {{-- Logo --}}
    <div style="display: table-cell; width: 100px; vertical-align: middle; text-align: left;">
        @if(file_exists(public_path('assets/img/logo.png')))
            <img src="{{ public_path('assets/img/logo.png') }}" alt="{{ $company->name ?? 'Logo' }}" style="max-width: 150%; height: auto;">
        @elseif(file_exists(public_path('assets/img/logo.jpg')))
            <img src="{{ public_path('assets/img/logo.jpg') }}" alt="{{ $company->name ?? 'Logo' }}" style="max-width: 150%; height: auto;">
        @else
            {{-- Placeholder si aucun logo --}}
            <div style="width: 80px; height: 60px; background: #e2e8f0; border-radius: 6px; display: flex; align-items: center; justify-content: center; color: #64748b; font-size: 10px; text-align: center;">Logo</div>
        @endif
    </div>

    {{-- Informations société --}}
    <div style="display: table-cell; vertical-align: middle; text-align: center; padding: 0 15px;">
        <h1 style="margin: 0; font-size: 18pt; font-weight: 700; color: #0f172a;">{{ $company->name ?? config('app.name') }}</h1>
        <p style="margin: 2px 0; font-size: 9pt; color: #475569;">{{ $company->address ?? 'Adresse non renseignée' }}</p>
        <p style="margin: 2px 0; font-size: 9pt; color: #475569;">
            Tél : {{ $company->phone ?? '+224 610050512/ 661515196/ 623523654' }} | Email : {{ $company->email ?? 'edaagtrading0@gmail.com' }}
            @if($company->rc ?? false)
                | RC : {{ $company->rc }} | NIF : {{ $company->nif ?? 'GN.TCC.2022.A.03557' }}
            @endif
        </p>
    </div>

    {{-- Métadonnées du rapport --}}
    <div style="display: table-cell; width: 200px; vertical-align: middle; text-align: right; background: #f8fafc; padding: 8px 12px; border-radius: 6px; border-left: 4px solid #2563eb; font-size: 9pt;">
        <p style="margin: 2px 0;"><strong>RAPPORT N°</strong> {{ 'RPT-' . now()->format('Ymd-His') }}</p>
        <p style="margin: 2px 0;"><strong>Émis le</strong> {{ now()->format('d/m/Y à H:i') }}</p>
        <p style="margin: 2px 0;"><strong>Par</strong> {{ auth()->user()->name ?? auth()->user()->email ?? 'Système' }}</p>
        @if($isAdmin)
            <span style="background: #2563eb; color: white; padding: 2px 8px; border-radius: 12px; font-size: 8pt; font-weight: 600; display: inline-block; margin-top: 4px;">Administrateur</span>
        @endif
    </div>
</div>

        {{-- ======================================== --}}
        {{-- TITRE ET FILTRES APPLIQUÉS --}}
        {{-- ======================================== --}}
        <div class="title-section">
            <h2>Rapport des mouvements financiers</h2>
            <div class="filters">
                <strong>Période :</strong>
                @php
                    $dateDebut = request('date_debut');
                    $dateFin = request('date_fin');
                @endphp
                @if($dateDebut && $dateFin)
                    @if($dateDebut === $dateFin)
                        le {{ \Carbon\Carbon::parse($dateDebut)->isoFormat('DD/MM/YYYY') }}
                    @else
                        du {{ \Carbon\Carbon::parse($dateDebut)->isoFormat('DD/MM/YYYY') }}
                        au {{ \Carbon\Carbon::parse($dateFin)->isoFormat('DD/MM/YYYY') }}
                    @endif
                @elseif($dateDebut)
                    à partir du {{ \Carbon\Carbon::parse($dateDebut)->isoFormat('DD/MM/YYYY') }}
                @elseif($dateFin)
                    jusqu'au {{ \Carbon\Carbon::parse($dateFin)->isoFormat('DD/MM/YYYY') }}
                @else
                    Toutes les dates
                @endif
                &nbsp;|&nbsp;
                <strong>Type :</strong>
                @switch(request('type'))
                    @case('sale') Ventes @break
                    @case('purchase') Achats @break
                    @case('expense') Dépenses @break
                    @default Tous
                @endswitch
            </div>
        </div>

        {{-- ======================================== --}}
        {{-- RÉCAPITULATIF : 4 CARTES DE SYNTHÈSE --}}
        {{-- ======================================== --}}
        <div class="summary-grid">
            <div class="summary-card ventes">
                <div class="label">Ventes</div>
                <div class="value text-success">{{ number_format($totalVentes ?? 0, 0, ',', ' ') }} F</div>
            </div>
            <div class="summary-card achats">
                <div class="label">Achats</div>
                <div class="value text-warning">{{ number_format($totalAchats ?? 0, 0, ',', ' ') }} F</div>
            </div>
            <div class="summary-card depenses">
                <div class="label">Dépenses</div>
                <div class="value text-danger">{{ number_format($totalDepenses ?? 0, 0, ',', ' ') }} F</div>
            </div>
            <div class="summary-card solde">
                <div class="label">Solde</div>
                <div class="value {{ ($solde ?? 0) >= 0 ? 'text-success' : 'text-danger' }}">
                    {{ number_format($solde ?? 0, 0, ',', ' ') }} F
                </div>
            </div>
        </div>

        {{-- ======================================== --}}
        {{-- DÉTAIL DES MOUVEMENTS --}}
        {{-- ======================================== --}}
        <table class="movements-table" cellspacing="0">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Référence</th>
                    <th>Type</th>
                    <th>Produit / Libellé</th>
                    <th class="text-center">Qté</th>
                    <th class="text-right">Montant</th>
                    <th>Détails</th>
                    @if($isAdmin)
                        <th>Magasin</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($movements ?? [] as $mvt)
                <tr>
                    <td class="nowrap">
                        @if(isset($mvt['date']))
                            @if($mvt['date'] instanceof \Carbon\Carbon)
                                {{ $mvt['date']->isoFormat('DD/MM/YYYY HH:mm') }}
                            @else
                                {{ \Carbon\Carbon::parse($mvt['date'])->isoFormat('DD/MM/YYYY HH:mm') }}
                            @endif
                        @else
                            N/A
                        @endif
                    </td>
                    <td><strong>{{ $mvt['reference'] ?? '—' }}</strong></td>
                    <td class="text-center">
                        @php
                            $type = $mvt['type_code'] ?? $mvt['type'] ?? '';
                            $badgeClass = match($type) {
                                'sale' => 'vente',
                                'purchase' => 'achat',
                                'expense' => 'depense',
                                default => 'autre'
                            };
                            $typeLabel = match($type) {
                                'sale' => 'Vente',
                                'purchase' => 'Achat',
                                'expense' => 'Dépense',
                                default => $mvt['type'] ?? '—'
                            };
                        @endphp
                        <span class="badge {{ $badgeClass }}">{{ $typeLabel }}</span>
                    </td>
                    <td>{{ $mvt['produit_nom'] ?? '—' }}</td>
                    <td class="text-center">{{ $mvt['produit_qte'] ?? '—' }}</td>
                    <td class="text-right {{ ($mvt['type_code'] ?? '') == 'sale' ? 'text-success' : 'text-danger' }}">
                        <strong>{{ number_format($mvt['montant'] ?? 0, 0, ',', ' ') }} F</strong>
                    </td>
                    <td>{{ $mvt['details'] ?? '—' }}</td>
                    @if($isAdmin)
                        <td>{{ $mvt['store_name'] ?? 'N/A' }}</td>
                    @endif
                </tr>
                @empty
                <tr>
                    <td colspan="{{ $isAdmin ? 8 : 7 }}" class="empty-message">
                        Aucun mouvement trouvé pour les critères sélectionnés.
                    </td>
                </tr>
                @endforelse
            </tbody>
            @if(isset($movements) && count($movements) > 0)
            <tfoot>
                <tr class="total-row">
                    <td colspan="5" class="text-right"><strong>TOTAL GÉNÉRAL</strong></td>
                    <td class="text-right">
                        <strong>{{ number_format(collect($movements)->sum('montant'), 0, ',', ' ') }} F</strong>
                    </td>
                    <td colspan="{{ $isAdmin ? 2 : 1 }}"></td>
                </tr>
            </tfoot>
            @endif
        </table>

        {{-- ======================================== --}}
        {{-- PIED DE PAGE : SIGNATURE NUMÉRIQUE --}}
        {{-- ======================================== --}}

        <div class="footer">
            @if(!empty($company?->address))
                <div class="footer-contact">{{ $company->address }}</div>
            @endif
            <div class="footer-thanks">Merci pour votre confiance et à bientôt!</div>
            <div class="footer-date">Rapport généré le {{ now()->format('d/m/Y H:i') }}</div>
        </div>
            
    </div>
</body>
</html>