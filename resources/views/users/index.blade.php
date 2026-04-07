<!DOCTYPE html>
<html lang="en">
    @include('layouts.head')
    <body>
        <div id="global-loader">
            <div class="whirly-loader"> </div>
        </div>

        <div class="main-wrapper">
            @include('layouts.header')
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @include('layouts.sidebar')
            <div class="page-wrapper">
                <div class="content">
                    <div class="page-header">
                        <div class="page-title">
                            <h4>Liste des Utilisateurs</h4>
                            <h6>Gérer vos Utilisateurs</h6>
                        </div>
                        <div class="page-btn">
                            <a href="{{ route('addUser') }}" class="btn btn-added"><img src="assets/img/icons/plus.svg" alt="img" class="me-2">Ajouter Utilisateur</a>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-top">
                                <div class="search-set">
                                    <div class="search-input">
                                        <a class="btn btn-searchset">
                                            <img src="assets/img/icons/search-white.svg" alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table  datanew">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Phone</th>
                                            <th>email</th>
                                            <th>Nom Utilisateur</th>
                                            <th>Mot de Passe</th>
                                            <th>Status</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataTable as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->username }}</td>
                                            <td>{{ $item->motdepasse }}</td>
                                            <td>
                                                @php $toggleId = "user-status-{$item->id}"; @endphp
                                                <input type="checkbox" id="{{ $toggleId }}" class="check" {{ ($item->status == 'Active') ? 'checked' : ''}}>
                                                <label for="{{ $toggleId }}" class="checktoggle">checkbox</label>
                                            </td>
                                            <td>{{ $item->role }}</td>
                                            <td class="text-end">
                                                <a class="me-3" href="{{ route('editUser', $item->id) }}">
                                                    <img src="assets/img/icons/edit.svg" alt="img">
                                                </a>
                                                <!-- Delete button -->
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-danger"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteUserModal-{{ $item->id }}">
                                                    <i class="fa fa-trash me-1"></i> Supprimer
                                                </button>

                                                <!-- Delete Modal -->
                                                <div class="modal fade" id="deleteUserModal-{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">

                                                            <div class="modal-header bg-danger text-white">
                                                                <h5 class="modal-title">Confirmer la suppression</h5>
                                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>

                                                            <div class="modal-body">
                                                                <p class="mb-2">
                                                                    Voulez-vous vraiment supprimer cet utilisateur ?
                                                                </p>

                                                                <div class="p-3 bg-light rounded border">
                                                                    <div><strong>Nom:</strong> {{ $item->name }}</div>
                                                                    <div><strong>Email:</strong> {{ $item->email }}</div>
                                                                    <div><strong>Username:</strong> {{ $item->username }}</div>
                                                                </div>

                                                                <p class="text-danger mt-3 mb-0">
                                                                    Cette action est irréversible.
                                                                </p>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                    Annuler
                                                                </button>

                                                                <form action="{{ route('users.destroy', $item->id) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">
                                                                        Oui, supprimer
                                                                    </button>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.scripts')
    </body>
</html>

