<div class="container">
    <div class="row">
        <div class="col-sm-12 col-lg-4 mb-10 bg-light p-5">
            <div class="menu menu-rounded menu-column menu-active-bg menu-hover-bg menu-title-gray-700 fs-5 fw-semibold" id="aside_menu" data-kt-menu="true">
                <div class="menu-item">
                    <a href="{{ route('accountCenter.setting.privacy') }}" wire:navigate class="menu-link active border-3 border-start border-primary">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user-secret fs-3 text-gray-400"></i>
                        </span>
                        <span class="menu-title">Confidentialité</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a href="{{ route('accountCenter.setting.blacklist') }}" wire:navigate class="menu-link border-3 border-start border-transparent">
                        <span class="menu-icon">
                            <i class="fa-solid fa-user-lock fs-3 text-gray-400"></i>
                        </span>
                        <span class="menu-title">Utilisateurs Bloqués</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a href="{{ route('accountCenter.setting.system') }}" wire:navigate class="menu-link border-3 border-start border-transparent">
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
                    <div class="card-title">Paramètres des recommandations</div>
                    <div class="card-toolbar"></div>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-row justify-content-between align-items-center mb-2 shadow rounded-3 p-5">
                        <span>Accepter de recevoir des messages promotionnels (notifications push)</span>
                        <div class="d-flex flex-row">
                            <label class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" wire:model="optin" wire:change="updateOptin" @if($optin) checked @endif type="checkbox" value="1"/>
                            </label>
                            <span class="spinner-border spinner-border-sm align-middle ms-2" wire:loading wire:target="updateOptin"></span>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between align-items-center mb-2 shadow rounded-3 p-5">
                        <span>Accepter de recevoir des messages promotionnels (e-mails d'informations)</span>
                        <div class="d-flex flex-row">
                            <label class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" wire:model="notifin" wire:change="updateNotifin" @if($notifin) checked @endif type="checkbox" value="1"/>
                            </label>
                            <span class="spinner-border spinner-border-sm align-middle ms-2" wire:loading wire:target="updateNotifin"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
