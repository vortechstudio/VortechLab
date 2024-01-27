<div class="container">
    <div class="row">
        <div class="col-sm-12 col-lg-4 mb-10 bg-light p-5">
            <div class="menu menu-rounded menu-column menu-active-bg menu-hover-bg menu-title-gray-700 fs-5 fw-semibold" id="aside_menu" data-kt-menu="true">
                <div class="menu-item">
                    <a href="{{ route('accountCenter.setting.privacy') }}" wire:navigate class="menu-link border-3 border-start border-transparent">
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
                    <a href="{{ route('accountCenter.setting.system') }}" wire:navigate class="menu-link active border-3 border-start border-primary">
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
                    <div class="card-title">Système</div>
                    <div class="card-toolbar"></div>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
