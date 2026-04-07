<!DOCTYPE html>
<html lang="en">
    @include('layouts.head')
    <body>
        <style>
            .total {
                font-size: 18px;
                font-weight: bold;
                margin-top: 20px;
            }

            .product-row {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin: 10px 0;
                padding: 10px;
                border: 1px solid #ccc;
            }

            .product-row .quantity-set,
            .product-row .price,
            .product-row .row-total {
                margin-right: 10px;
            }

            .delete-btn {
                background-color: red;
                color: white;
                padding: 5px 10px;
                border: none;
                cursor: pointer;
            }

            .delete-btn:hover {
                background-color: darkred;
            }
        </style>
        <div id="global-loader">
            <div class="whirly-loader"> </div>
        </div>

        <div class="main-wrapper">
            @include('layouts.header')

            <div class="page-wrapper ms-0">
                <div class="content">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 col-sm-12 tabs_wrapper">
                            <div class="page-header ">
                                <div class="page-title">
                                    <h4>POS</h4>
                                    <h6>Manage your sales</h6>
                                </div>
                            </div>
                            <div class="form-group position-relative mb-3" style="max-width: 400px;">
                                <input type="text" class="form-control" id="posSearchInput" placeholder="Rechercher produit ou catégorie...">
                                <span id="clearSearchBtn" style="position:absolute; right:10px; top:50%; transform:translateY(-50%); cursor:pointer; display:none;">
                                    <i class="fa fa-times-circle text-muted"></i>
                                </span>
                            </div>
                            @include('layouts.flash')
                            <ul class="tabs owl-carousel owl-theme owl-product border-0">
                                @foreach ($categories as $index => $item)
                                <li class="tab-item {{ $index == 0 ? 'active' : '' }}" data-tab="{{ $item->slug }}">
                                    <div class="product-details">
                                        <h6>{{ $item->slug }}</h6>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            <div class="tabs_container">
                                @foreach ($categories as $index => $category)
                                <div class="tab_content {{ $index == 0 ? 'active' : '' }}" data-tab="{{ $category->slug }}">
                                    <div class="row">
                                        @foreach ($produits->filter(fn($p) => $p->categories->contains('slug', $category->slug)) as $dataItem)
                                        @php
                                            // Calculate the quantity
                                            if ($userStoreId) {
                                                $store = $dataItem->stores()->where('store_id', $userStoreId)->first();
                                                $quantity = $store ? $store->pivot->quantity : 0;
                                            } else {
                                                $quantity = $dataItem->stores->sum('pivot.quantity');
                                            }
                                        @endphp
                                        @if($quantity > 0)
                                        <div class="col-lg-4 col-sm-4 col-6 d-flex product-item"
                                             data-numeroFacture="{{ $numeroFacture }}"
                                             data-sku="{{ $dataItem->sku }}"
                                             data-id="{{ $dataItem->id }}"
                                             data-price="{{ $dataItem->price_sale_ctn }}">
                                            <div class="productset flex-fill">
                                                <div class="productsetimg">
                                                    <img src="{{ asset('products/' . $dataItem->image) }}" alt="img" style="height: 170px">
                                                    <h6>Qtity: {{ $quantity }}</h6>
                                                    <div class="check-product">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                                <div class="productsetcontent">
                                                    <h6>
                                                        @foreach ($dataItem->categories as $category)
                                                        {{ $category->slug }}
                                                        @endforeach
                                                    </h6>
                                                    <h5>{{ $dataItem->libelle }}</h5>
                                                    <h4>{{ $dataItem->sku }}</h4>
                                                    <h4>Prix Achat: {{ $dataItem->price.' FG' ?? 'N/A' }}</h4>
                                                    <h4>Prix Revient: {{ $dataItem->price_sale.' FG' ?? 'N/A' }}</h4>
                                                    <h4>Prix Vente: {{ $dataItem->price_sale_ctn.' FG' ?? 'N/A' }}</h4>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-12 ">
                            <div class="order-list">
                                <div class="orderid">
                                    <h4>Order List</h4>
                                    <h5>Invoice id : #{{ $numeroFacture }}</h5>
                                </div>
                                <div class="actionproducts">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0);"><img src="assets/img/icons/return1.svg" alt="img"></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card card-order">
                                <form action="{{ route('sales.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body pt-0">
                                        <div class="product-table" id="product-list">
                                            <h5>Products List</h5>
                                        </div>
                                    </div>
                                    <div class="split-card">
                                    </div>
                                    <div class="card-body pt-0 pb-2">
                                        <div class="setvalue">
                                            <ul>
                                                <li>
                                                    <h5>Subtotal </h5>
                                                    <h4 id="subtotal">0.00</h4>
                                                </li>
                                                <li>
                                                    <h5>Autres Frais </h5>
                                                    <input type="text" id="tax" style="width: 60px" class="form-control" value="0">
                                                    {{-- <h6><span id="tax">0.00$</span></h6> --}}
                                                </li>
                                                <li>
                                                    <h5>Total</h5>
                                                    <h4 id="finalTotal">0.00</h4>
                                                    <input type="hidden" id="final_total" name="final_total">
                                                </li>
                                            </ul>
                                        </div>
                                        <h5>Information Customer</h5>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="select-split form-group">
                                                        <div class="select-group w-100">
                                                            <select name="customer_id" id="customer_id" class="form-control">
                                                                <option value="">Sélectionner Client</option> <!-- Ajout d'une valeur vide -->
                                                                @foreach ($customers as $item)
                                                                    <option value="{{ $item->id }}" {{ old('customer_id') == $item->id ? 'selected' : '' }}>
                                                                        {{ $item->customerName.' '.$item->mark }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12" id="addCustomerButton">
                                                    <a href="javascript:void(0);" class="btn btn-adds" data-bs-toggle="modal" data-bs-target="#create"><i class="fa fa-plus me-2"></i>Add Customer</a>
                                                </div>
                                                <div class="col-lg-12">
                                                    <input type="hidden" name="numeroFacture" value="{{ $numeroFacture }}">
                                                    <div class="select-split form-group">
                                                        <div class="select-group w-100">
                                                            <select name="store_id" id="store_id" class="form-control">
                                                                <option value="">Sélectionner Magasin</option> <!-- Ajout d'une valeur vide -->
                                                                @if ($userStoreId)
                                                                    <option value="{{ $userStoreId }}" selected>{{ App\Models\Store::find($userStoreId)->store_name }}</option>
                                                                @else
                                                                @foreach ($boutiques as $item)
                                                                    <option value="{{ $item->id }}">{{ $item->store_name }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="split-card">
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label for="avance">Avance Paid</label>
                                                    <input type="text" id="avance" name="avance" value="0" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-lg-6 col-12">
                                                <div class="form-group">
                                                    <label for="paid_by">Method Payement</label>
                                                    <select name="paid_by" id="paid_by" class="form-control">
                                                        <option value="cash">Cash</option>
                                                        <option value="check">Card</option>
                                                        <option value="orange money">OM</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="notes">Notes</label>
                                                <textarea name="notes" id="notes" class="form-control"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary form-control">Confirm Command
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="create" tabindex="-1" aria-labelledby="create" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Creer Client</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addCustomerForm">
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="customerName">Customer Name</label>
                                        <input type="text" name="customerName" id="customerName" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="mark">Customer Mark</label>
                                        <input type="text" name="mark" id="mark" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" id="email">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="tel">Phone</label>
                                        <input type="text" name="tel" id="tel">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <textarea name="address" id="address" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button>
                                <a class="btn btn-cancel" data-bs-dismiss="modal">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="delete" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Order Deletion</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="delete-order">
                            <img src="assets/img/icons/close-circle1.svg" alt="img">
                        </div>
                        <div class="para-set text-center">
                            <p>The current order will be deleted as no payment has been <br> made so far.</p>
                        </div>
                        <div class="col-lg-12 text-center">
                            <a class="btn btn-danger me-2">Yes</a>
                            <a class="btn btn-cancel" data-bs-dismiss="modal">No</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .check-product {
                display: none; /* Hide checkbox initially */
                position: absolute;
                top: 10px;
                right: 10px;
                background-color: #007bff;
                color: white;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 14px;
                font-weight: bold;
            }

            .product-item.selected .check-product {
                display: flex; /* Show checkbox when selected */
            }
            .qty-price-group {
                display: flex;
                flex-direction: row;
                gap: 16px; /* space between Qty and Prix */
                flex-wrap: wrap;
            }

            .qty-price-group .form-group {
                flex: 1;
                min-width: 120px;
            }

            /* Stack vertically on small screens */
            @media (max-width: 768px) {
                .qty-price-group {
                    flex-direction: column;
                }
            }

        </style>
        <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('assets/js/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/sweetalert/sweetalert2.all.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/sweetalert/sweetalerts.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const productList = document.getElementById('product-list'); // Reference to the product list
                let i = 0;

                document.addEventListener('click', function (event) {
                    const item = event.target.closest('.product-item');
                    if (!item) {
                        return;
                    }

                    i++;
                    // Get the SKU and other details from the selected product
                    const sku = item.getAttribute('data-sku');
                    const product_id = item.getAttribute('data-id');
                    const numeroFacture = item.getAttribute('data-numeroFacture');
                    const productPrice = parseFloat(item.getAttribute('data-price')) || 0;
                    const libelle = item.querySelector('.productsetcontent h5').textContent;
                    const imageUrl = item.querySelector('.productsetimg img').src;

                    // Check if the product is already in the product list
                    const existingRow = document.querySelector(`#product-list li[data-sku="${sku}"]`);
                    if (existingRow) {
                        // If the product already exists, remove it
                        existingRow.remove();
                        item.classList.remove('selected');
                        updateTotalPrice(); // Update total after removal
                        updateTotalCheckout(); // Update total after removal after
                        return; // Exit to avoid adding the product again
                    }

                    item.classList.add('selected');

                    // Create a new row for the product list
                    const newRow = document.createElement('li');
                    newRow.classList.add('product-row');
                    newRow.setAttribute('data-sku', sku); // Add SKU to the row for easy identification
                    newRow.innerHTML = `
                            <ul class="product-lists">
                                <input type="hidden" name="sales[${i}][product_id]" value="${product_id}">
                                <input type="hidden" name="sales[${i}][numeroFacture]" value="${numeroFacture}">
                                <li>
                                    <div class="productimg">
                                        <div class="productimgs">
                                            <img src="${imageUrl}" alt="img">
                                        </div>
                                        <div class="productcontet">
                                            <h4>${libelle}</h4>
                                            <div class="productlinkset">
                                                <h5>${sku}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                               <li class="qty-price-group">
                                   <div class="quantity-set form-group">
                                       <h6>Qty</h6>
                                       <input type="number" style="width:150px" name="sales[${i}][quantity]" value="1" class="quantity-field form-control">
                                   </div>

                                   <div class="price form-group">
                                       <h6>Prix</h6>
                                       <input type="text" style="width:150px" name="sales[${i}][prix]" value="${productPrice}" class="price-field form-control">
                                       <div class="text-danger price-error mt-1" style="font-size: 0.9rem; display: none;"></div>
                                   </div>
                               </li>
                                <li>
                                    <div class="row-total form-group">
                                        <h6>Total</h6>
                                        <input type="text" name="sales[${i}][total_price]" class="form-control row-total-price" readonly>
                                    </div>
                                </li>
                            </ul>
                        `;

                    // Append the new row to the product list
                    productList.appendChild(newRow);

                    // Update the total price when quantity or price changes
                    const quantityField = newRow.querySelector('.quantity-field');
                    const priceField = newRow.querySelector('.price-field');
                    const priceError = newRow.querySelector('.price-error');

                    quantityField.addEventListener('input', updateRowTotal);
                    priceField.addEventListener('input', function () {
                        const enteredPrice = parseFloat(priceField.value) || 0;

                        if (enteredPrice < productPrice) {
                            priceError.textContent = `Le prix ne peut pas être inférieur à ${productPrice.toFixed(2)} GNF`;
                            priceError.style.display = 'block';
                            priceField.classList.add('is-invalid');
                        } else {
                            priceError.textContent = '';
                            priceError.style.display = 'none';
                            priceField.classList.remove('is-invalid');
                        }

                        updateRowTotal();
                    });

                    // Function to update the row total
                    function updateRowTotal() {
                        const quantity = parseFloat(quantityField.value) || 0;
                        const price = parseFloat(priceField.value) || 0;
                        const rowTotal = quantity * price;
                        newRow.querySelector('.row-total-price').value = rowTotal.toFixed(2);
                        updateTotalPrice(); // Recalculate total price whenever a value changes
                    }
                    updateRowTotal();
                    // Update total price after adding the product
                    updateTotalPrice();
                    //updateTotalCheckout();
                });
                // Function to update the total price, subtotal, and final price with tax
                function updateTotalPrice() {
                    let subtotal = 0;
                    const rows = document.querySelectorAll('.product-row');
                    rows.forEach(row => {
                        const rowTotal = parseFloat(row.querySelector('.row-total-price').value) || 0;
                        subtotal += rowTotal;
                    });

                    const subtotalElement = document.getElementById('subtotal');
                    const taxElement = document.getElementById('tax');

                    if (subtotalElement) {
                        subtotalElement.textContent = `${subtotal.toFixed(2)}`;
                        const taxAmount = parseFloat(taxElement?.value || 0) || 0;
                        const finalTotal = subtotal + taxAmount;
                        const finalTotalElement = document.getElementById('finalTotal');
                        const totalAmountElement = document.getElementById('final_total');
                        if (totalAmountElement) {
                            totalAmountElement.value = finalTotal.toFixed(2);
                        }
                        if (finalTotalElement) {
                            finalTotalElement.textContent = finalTotal.toFixed(2);
                        }
                    }
                }
                const taxInput = document.getElementById('tax');
                if (taxInput) {
                    taxInput.addEventListener('input', updateTotalPrice);
                }

                const addCustomerButton = document.getElementById('addCustomerButton');
                const selectCustomer = document.getElementById('customer_id');

                // Vérifier au chargement
                showHideCustomerButton();

                // Ajouter un écouteur sur le changement de sélection
                selectCustomer.addEventListener('change', function () {
                    console.log('Sélection modifiée :', selectCustomer.value);
                    showHideCustomerButton();
                });

                function showHideCustomerButton() {
                    console.log('Vérification du bouton...');

                    if (!selectCustomer.value || selectCustomer.value === 'Selectionner Client') {
                        addCustomerButton.style.display = 'block'; // Afficher le bouton
                    } else {
                        addCustomerButton.style.display = 'none'; // Masquer le bouton
                    }
                }
                const addCustomerModal = new bootstrap.Modal(document.getElementById('create'));
                document.getElementById('addCustomerForm').addEventListener('submit', function (e) {
                    e.preventDefault();
                    let formData = new FormData(this);

                    fetch('{{ route("pos.storeCustomer") }}', {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const customerSelect = document.getElementById('customer_id');
                            console.log(customerSelect);

                            let newOption = document.createElement('option');
                            newOption.value = data.customer.id;
                            newOption.textContent = `${data.customer.customerName} ${data.customer.mark}`;
                            customerSelect.appendChild(newOption);

                            customerSelect.value = data.customer.id;
                            showHideCustomerButton();

                            // Ferme le modal et reset le formulaire
                            addCustomerModal.hide();
                            document.getElementById('addCustomerForm').reset();
                        } else {
                            console.log('Erreur lors de l’ajout du client.');
                        }
                    })
                    .catch(error => console.error('Erreur:', error));
                });
            });
        </script>
      <script>
          document.addEventListener('DOMContentLoaded', function () {
              const searchInput = document.getElementById('posSearchInput');
              const clearSearchBtn = document.getElementById('clearSearchBtn');
              const tabContents = document.querySelectorAll('.tab_content');
              const tabItems = document.querySelectorAll('.tab-item');

              // Fonction principale de réinitialisation
              function resetToInitialState() {
                  const savedTab = localStorage.getItem('activeTab');

                  tabItems.forEach(tab => tab.classList.remove('active'));
                  tabContents.forEach(tab => {
                      tab.classList.remove('active');
                      tab.style.display = 'none';
                  });

                  let targetTab = tabItems[0];
                  let targetContent = tabContents[0];

                  if (savedTab) {
                      const savedTabItem = document.querySelector(`.tab-item[data-tab="${savedTab}"]`);
                      const savedContent = document.querySelector(`.tab_content[data-tab="${savedTab}"]`);
                      if (savedTabItem && savedContent) {
                          targetTab = savedTabItem;
                          targetContent = savedContent;
                      }
                  }

                  targetTab.classList.add('active');
                  targetContent.classList.add('active');
                  targetContent.style.display = 'block';
              }

              // Gestion de la recherche
              searchInput.addEventListener('input', function () {
                  const searchTerm = this.value.toLowerCase();

                  clearSearchBtn.style.display = searchTerm ? 'inline' : 'none';

                  tabContents.forEach(tab => {
                      let hasVisibleProducts = false;
                      const products = tab.querySelectorAll('.product-item');

                      products.forEach(product => {
                          const libelle = product.querySelector('.productsetcontent h5')?.textContent.toLowerCase() || '';
                          const sku = product.getAttribute('data-sku')?.toLowerCase() || '';
                          const cat = product.querySelector('.productsetcontent h6')?.textContent.toLowerCase() || '';

                          const match = libelle.includes(searchTerm) || sku.includes(searchTerm) || cat.includes(searchTerm);
                          product.style.display = match ? 'flex' : 'none';
                          if (match) hasVisibleProducts = true;
                      });

                      tab.style.display = hasVisibleProducts ? 'block' : 'none';
                      tab.classList.remove('active');
                  });

                  // On enlève la classe active des onglets pour empêcher l'affichage par défaut
                  tabItems.forEach(tab => tab.classList.remove('active'));
              });

              // Bouton pour vider la recherche
              clearSearchBtn.addEventListener('click', function () {
                  searchInput.value = '';
                  clearSearchBtn.style.display = 'none';
                  resetToInitialState();
                  searchInput.focus();
              });

              // Gestion du clic sur les onglets (catégories)
              tabItems.forEach(tab => {
                  tab.addEventListener('click', () => {
                      const target = tab.getAttribute('data-tab');

                      // Sauvegarde de l'onglet actif
                      localStorage.setItem('activeTab', target);

                      // Réinitialisation des classes
                      tabItems.forEach(t => t.classList.remove('active'));
                      tabContents.forEach(c => {
                          c.classList.remove('active');
                          c.style.display = 'none';
                      });

                      // Activation du bon onglet
                      tab.classList.add('active');
                      const contentToShow = document.querySelector(`.tab_content[data-tab="${target}"]`);
                      if (contentToShow) {
                          contentToShow.classList.add('active');
                          contentToShow.style.display = 'block';
                      }
                  });
              });

              // Initialisation
              resetToInitialState();
          });
      </script>
        <!-- Owl Carousel -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

        <script>
            $(document).ready(function() {
                $(".owl-carousel").owlCarousel({
                    items: 5,
                    loop: false,
                    margin: 10,
                    nav: true
                });
            });
        </script>
    </body>
</html>
