@extends('layouts.template')

@section('content')
<div class="container mt-4">
    <!-- En-tête amélioré -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-primary mb-1">
                <i class="fas fa-user-tag me-2"></i>Gestion des affectations
            </h2>
            <p class="text-muted">Affectez des utilisateurs aux boutiques de votre organisation</p>
        </div>
        <div class="badge bg-primary bg-opacity-10 text-primary p-3">
            <i class="fas fa-store me-1"></i>
            <span>{{ $stores->count() }} boutiques disponibles</span>
        </div>
    </div>

    <div class="row">
        <!-- Formulaire -->
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="card-title mb-0">
                        <i class="fas fa-link text-primary me-2"></i>Nouvelle affectation
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.assignStore') }}" method="POST" id="assignmentForm">
                        @csrf
                        
                        <!-- Sélection d'utilisateur -->
                        <div class="mb-4">
                            <label for="user_id" class="form-label fw-semibold">
                                <i class="fas fa-user-circle me-2 text-primary"></i>Choisir un utilisateur
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-search text-muted"></i>
                                </span>
                                <select name="user_id" id="user_id" class="form-select form-select-lg py-2 border-start-0">
                                    <option value="" disabled selected>Sélectionnez un utilisateur...</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" data-email="{{ $user->email }}">
                                            {{ $user->name }} ({{ $user->email }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-text mt-2">
                                <i class="fas fa-info-circle me-1"></i>
                                Sélectionnez l'utilisateur à affecter à une boutique
                            </div>
                        </div>

                        <!-- Sélection de boutique -->
                        <div class="mb-4">
                            <label for="store_id" class="form-label fw-semibold">
                                <i class="fas fa-store me-2 text-primary"></i>Choisir une boutique
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-map-marker-alt text-muted"></i>
                                </span>
                                <select name="store_id" id="store_id" class="form-select form-select-lg py-2 border-start-0">
                                    <option value="" disabled selected>Sélectionnez une boutique...</option>
                                    @foreach($stores as $store)
                                        <option value="{{ $store->id }}">{{ $store->store_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-text mt-2">
                                <i class="fas fa-info-circle me-1"></i>
                                Choisissez la boutique où l'utilisateur sera affecté
                            </div>
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="d-grid mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg fw-semibold py-3">
                                <i class="fas fa-check-circle me-2"></i>Confirmer l'affectation
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Panneau latéral pour notifications et infos -->
        <div class="col-lg-4 mt-4 mt-lg-0">
            <!-- Messages d'alerte -->
            <div id="alertContainer">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show d-flex align-items-center shadow-sm" role="alert">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle fa-lg me-3"></i>
                    </div>
                    <div class="flex-grow-1">
                        <h6 class="alert-heading mb-1">Succès !</h6>
                        <div class="small">{{ session('success') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle fa-lg me-3"></i>
                        <div>
                            <h6 class="alert-heading mb-1">Erreur de traitement</h6>
                            <ul class="mb-0 ps-3 small">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>

            <!-- Panneau d'information -->
            <div class="card border-0 bg-light bg-opacity-25 shadow-sm mt-3">
                <div class="card-body">
                    <h6 class="card-title d-flex align-items-center">
                        <i class="fas fa-lightbulb text-warning me-2"></i>Bon à savoir
                    </h6>
                    <ul class="small ps-3 mb-0">
                        <li class="mb-2">Un utilisateur peut être affecté à plusieurs boutiques</li>
                        <li class="mb-2">Les affectations sont modifiables à tout moment</li>
                        <li>Les modifications prennent effet immédiatement</li>
                    </ul>
                </div>
            </div>
            
            <!-- Prévisualisation -->
            <div class="card border-0 shadow-sm mt-3">
                <div class="card-body">
                    <h6 class="card-title d-flex align-items-center">
                        <i class="fas fa-eye me-2 text-primary"></i>Prévisualisation
                    </h6>
                    <div class="d-flex align-items-center mt-3" id="preview">
                        <div class="flex-shrink-0">
                            <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                                <i class="fas fa-user text-primary"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <div class="fw-medium" id="previewUserName">Utilisateur</div>
                            <div class="small text-muted" id="previewUserEmail">Email</div>
                            <div class="small mt-1">
                                <i class="fas fa-arrow-right text-muted me-1"></i>
                                <span id="previewStoreName">Boutique</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Style supplémentaire -->
<style>
    .card {
        border-radius: 12px;
        transition: transform 0.2s ease;
    }
    .card:hover {
        transform: translateY(-2px);
    }
    .form-select {
        cursor: pointer;
        border-radius: 8px;
        transition: all 0.3s;
    }
    .form-select:focus {
        border-color: #86b7fe;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
    }
    .btn-primary {
        border-radius: 8px;
        background: linear-gradient(135deg, #0d6efd, #0a58ca);
        border: none;
        transition: all 0.3s;
    }
    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
    }
    .alert {
        border-radius: 10px;
        border: none;
    }
    #preview {
        opacity: 0.7;
        transition: opacity 0.3s;
    }
    #preview:hover {
        opacity: 1;
    }
</style>

<!-- Script corrigé pour la prévisualisation dynamique -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const userSelect = document.getElementById('user_id');
    const storeSelect = document.getElementById('store_id');
    
    function updatePreview() {
        const selectedUser = userSelect.options[userSelect.selectedIndex];
        const selectedStore = storeSelect.options[storeSelect.selectedIndex];
        
        // Extraire le nom de l'utilisateur (sans l'email)
        let userName = 'Utilisateur';
        let userEmail = 'Email';
        let storeName = 'Boutique';
        
        if (selectedUser.value) {
            // Le texte est au format "Nom (email@example.com)"
            const userText = selectedUser.textContent;
            const match = userText.match(/^(.*?)\s*\((.*?)\)$/);
            
            if (match) {
                userName = match[1].trim();
                userEmail = match[2].trim();
            } else {
                userName = userText;
                // Essayer de récupérer l'email depuis l'attribut data-email
                userEmail = selectedUser.getAttribute('data-email') || 'Email';
            }
        }
        
        if (selectedStore.value) {
            storeName = selectedStore.textContent;
        }
        
        // Mettre à jour l'affichage
        document.getElementById('previewUserName').textContent = userName;
        document.getElementById('previewUserEmail').textContent = userEmail;
        document.getElementById('previewStoreName').textContent = storeName;
        
        // Ajuster l'opacité
        const previewDiv = document.getElementById('preview');
        if (selectedUser.value && selectedStore.value) {
            previewDiv.style.opacity = '1';
        } else {
            previewDiv.style.opacity = '0.7';
        }
    }
    
    // Écouter les changements sur les deux listes déroulantes
    userSelect.addEventListener('change', updatePreview);
    storeSelect.addEventListener('change', updatePreview);
    
    // Initialiser la prévisualisation
    updatePreview();
});
</script>
@endsection