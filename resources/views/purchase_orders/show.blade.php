<!DOCTYPE html>
<html lang="en">
    @include('layouts.head')
    <body>
        <style>
            .po-status {
                padding: 4px 12px;
                border-radius: 20px;
                font-size: 12px;
                font-weight: 600;
            }
            .po-status-pending { background: #fff4de; color: #ffab00; }
            .po-status-received { background: #e2f5e9; color: #2ea86f; }
            .po-status-cancelled { background: #fdecea; color: #e04f4f; }
            .po-summary-card {
                background: #fff;
                border: 1px solid #f0e4d8;
                border-radius: 10px;
                padding: 20px;
                margin-bottom: 20px;
            }
            .po-summary-item {
                margin-bottom: 8px;
            }
            .po-summary-item span {
                color: #8a8a8a;
                display: block;
                font-size: 12px;
            }
            .po-summary-item strong {
                font-size: 15px;
            }
            .po-grand-total {
                background: #fdf6ec;
                border: 1px solid #f0e0c8;
                border-radius: 10px;
                padding: 15px 20px;
                font-size: 15px;
                margin-top: 15px;
            }
            .po-grand-total strong {
                color: #c1682f;
            }
        </style>
        <div id="global-loader">
            <div class="whirly-loader"> </div>
        </div>
        <div class="main-wrapper">
            @include('layouts.header')
            @include('layouts.sidebar')

            <div class="page-wrapper">
                <div class="content">
                    <div class="page-header">
                        <div class="page-title">
                            <h4>Achat {{ $order->reference }}</h4>
                            <h6>Détail du coût de revient</h6>
                        </div>
                        <div class="page-btn">
                            @if($order->status !== 'cancelled')
                            <a class="btn btn-added" href="{{ route('purchase-orders.edit', $order->id) }}">
                                <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img" class="me-2">Modifier
                            </a>
                            @endif
                            <a class="btn btn-secondary ms-2" href="{{ route('purchase-orders.index') }}">Retour à la liste</a>
                        </div>
                    </div>
                    @include('layouts.flash')

                    <div class="po-summary-card">
                        <div class="row">
                            <div class="col-lg-2 col-sm-4 col-6 po-summary-item">
                                <span>Magasin</span>
                                <strong>{{ $order->store->store_name ?? $order->store->name ?? '—' }}</strong>
                            </div>
                            <div class="col-lg-2 col-sm-4 col-6 po-summary-item">
                                <span>Origine</span>
                                <strong>{{ $order->origin === 'chine' ? '🇨🇳 Chine' : '🇬🇳 Guinée' }}</strong>
                            </div>
                            @if($order->origin === 'chine')
                            <div class="col-lg-2 col-sm-4 col-6 po-summary-item">
                                <span>Devise / Taux</span>
                                <strong>{{ $order->currency_code }} = {{ number_format($order->exchange_rate_used, 2) }} GNF</strong>
                            </div>
                            @endif
                            <div class="col-lg-2 col-sm-4 col-6 po-summary-item">
                                <span>CBM total</span>
                                <strong>{{ $order->total_cbm ? number_format($order->total_cbm, 3) : '—' }}</strong>
                            </div>
                            <div class="col-lg-2 col-sm-4 col-6 po-summary-item">
                                <span>Statut</span>
                                @php $statusLabels = ['pending' => 'En attente', 'received' => 'Reçu', 'cancelled' => 'Annulé']; @endphp
                                <span class="po-status po-status-{{ $order->status }}">{{ $statusLabels[$order->status] ?? $order->status }}</span>
                            </div>
                            <div class="col-lg-2 col-sm-4 col-6 po-summary-item">
                                <span>Date émission</span>
                                <strong>{{ \Illuminate\Support\Carbon::parse($order->date_emis)->format('d/m/Y') }}</strong>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-3 col-sm-6 col-12 po-summary-item">
                                <span>Transport</span>
                                <strong>{{ number_format($order->transport_cost_gnf, 0, ',', ' ') }} GNF</strong>
                            </div>
                            @if($order->origin === 'chine')
                            <div class="col-lg-3 col-sm-6 col-12 po-summary-item">
                                <span>Douane / Dédouanement</span>
                                <strong>{{ number_format($order->customs_cost_gnf, 0, ',', ' ') }} GNF</strong>
                            </div>
                            @endif
                            <div class="col-lg-3 col-sm-6 col-12 po-summary-item">
                                <span>Frais divers</span>
                                <strong>{{ number_format($order->other_fees_gnf, 0, ',', ' ') }} GNF</strong>
                            </div>
                            @if($order->notes)
                            <div class="col-lg-3 col-sm-6 col-12 po-summary-item">
                                <span>Notes</span>
                                <strong>{{ $order->notes }}</strong>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Produit</th>
                                            <th>Quantité</th>
                                            @if($order->origin === 'chine')
                                            <th>Prix unitaire ({{ $order->currency_code }})</th>
                                            @endif
                                            <th>Prix unitaire (GNF)</th>
                                            @if($order->origin === 'chine')
                                            <th>CBM ligne</th>
                                            <th>Fret alloué</th>
                                            <th>Douane allouée</th>
                                            @endif
                                            <th>Coût de revient / unité</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $grandTotal = 0;
                                        @endphp
                                        @foreach($order->items as $item)
                                        @php
                                            $grandTotal += $item->landed_unit_cost_gnf * $item->quantity;
                                        @endphp
                                        <tr>
                                            <td>{{ $item->product->libelle ?? '—' }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            @if($order->origin === 'chine')
                                            <td>{{ number_format($item->unit_price_foreign, 2) }}</td>
                                            @endif
                                            <td>{{ number_format($item->unit_price_gnf, 0, ',', ' ') }}</td>
                                            @if($order->origin === 'chine')
                                            <td>{{ number_format($item->line_total_cbm, 3) }}</td>
                                            <td>{{ number_format($item->allocated_freight_gnf, 0, ',', ' ') }}</td>
                                            <td>{{ number_format($item->allocated_customs_gnf, 0, ',', ' ') }}</td>
                                            @endif
                                            <td><strong>{{ number_format($item->landed_unit_cost_gnf, 0, ',', ' ') }} GNF</strong></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="po-grand-total">
                                Coût de revient total de l'arrivage : <strong>{{ number_format($grandTotal, 0, ',', ' ') }} GNF</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.scripts')
    </body>
</html>
