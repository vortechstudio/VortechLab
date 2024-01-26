<div class="container">
    <div class="row">
        <div class="col-sm-12 col-lg-4 mb-10 bg-light p-5">
            <div class="menu menu-rounded menu-column menu-active-bg menu-hover-bg menu-title-gray-700 fs-5 fw-semibold" id="aside_menu" data-kt-menu="true">
                <div class="menu-item">
                    <a href="{{ route('accountCenter.setting.privacy') }}" class="menu-link active border-3 border-start border-transparent">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user-secret fs-3 text-gray-400"></i>
                        </span>
                        <span class="menu-title">Confidentialité</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a href="{{ route('accountCenter.setting.blacklist') }}" class="menu-link active border-3 border-start border-primary">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user-lock fs-3 text-gray-400"></i>
                        </span>
                        <span class="menu-title">Utilisateurs Bloqués</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a href="" class="menu-link border-3 border-start border-transparent">
                        <span class="menu-icon">
                            <i class="fa-solid fa-cogs fs-3 text-gray-400"></i>
                        </span>
                        <span class="menu-title">Système</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-lg-8 mb-10">
            <div class="card shadow-lg">
                <div class="card-header">
                    <div class="card-title">Utilisateurs Bloqués</div>
                    <div class="card-toolbar"></div>
                </div>
                <div class="card-body">
                    @if($blacklists->count() != 0)
                        @foreach($blacklists as $blacklist)
                            <div class="d-flex flex-row justify-content-between align-items-center mb-2 bg-gray-800 shadow rounded-3 p-5">
                                <div class="d-flex align-items-center flex-grow-1 text-inverse-dark">
                                    <div class="symbol symbol-50px me-5">
                                        <img src="{{ $blacklist->social->profil_img_link }}" alt="">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="fs-3 fw-semibold">{{ $blacklist->name }}</span>
                                        <span class="fs-6 fst-italic text-muted">{{ $blacklist->token_tag }}</span>
                                    </div>
                                </div>
                                <a href="" wire:click="uban({{ $blacklist->id }})" class="btn btn-flush" wire:loading.remove>
                                    <i class="fa-solid fa-user-check fs-3 text-gray-400"></i>
                                </a>
                                <span class="spinner-border spinner-border-sm align-middle ms-2" wire:loading wire:target="uban"></span>
                            </div>
                        @endforeach
                    @else
                        <x-base.is-null
                            text="Vous n'avez bloqué aucun utilisateur pour le moment." />
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
