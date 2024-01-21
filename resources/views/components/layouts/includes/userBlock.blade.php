<!--begin::User-->
@if(!empty($user))
    <div class="d-flex align-items-center me-lg-n2 ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
        <!--begin::Menu wrapper-->
        <div class="btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            <img class="h-30px w-30px rounded" src="{{ \Creativeorange\Gravatar\Facades\Gravatar::get($user->info->email) }}" alt="" />
        </div>
        <!--begin::User account menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-auto" data-kt-menu="true">
            <!--begin::Menu item-->
            <div class="menu-item px-3">
                <div class="menu-content d-flex align-items-center px-3">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px me-5">
                        <img alt="Logo" src="{{ \Creativeorange\Gravatar\Facades\Gravatar::get($user->info->email) }}" />
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Username-->
                    <div class="d-flex flex-column">
                        <div class="fw-bold d-flex align-items-center fs-5">{{ $user->info->name }}
                            <span class="ms-2">
                                {!! $user->info->type_label !!}
                            </span>
                        </div>
                        <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ $user->info->email }}</a>
                    </div>
                    <!--end::Username-->
                </div>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu separator-->
            <div class="separator my-2"></div>
            <!--end::Menu separator-->
            <div class="menu-heading px-5">
                <span class="fw-bold text-dark fs-4">Mes informations</span>
            </div>
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="{{ route('accountCenter.postList') }}" class="menu-link px-5 fs-4">
                    <span class="menu-icon me-2">
                        <i class="fa-solid fa-user-circle fs-3 text-gray-400"></i>
                    </span>
                    <span class="menu-title text-gray-700">Mon profil</span>
                </a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="https://auth.{{ config('app.domain') }}/account/app" target="_blank" class="menu-link px-5 fs-4">
                    <span class="menu-icon me-2">
                        <i class="fa-solid fa-user-secret fs-3 text-gray-400"></i>
                    </span>
                    <span class="menu-title text-gray-700">Mon compte</span>
                </a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="#" class="menu-link px-5 fs-4">
                    <span class="menu-icon me-2">
                        <i class="fa-solid fa-lock fs-3 text-gray-400"></i>
                    </span>
                    <span class="menu-title text-gray-700">Confidentialité</span>
                </a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="#" class="menu-link px-5 fs-4">
                    <span class="menu-icon me-2">
                        <i class="fa-solid fa-user-lock fs-3 text-gray-400"></i>
                    </span>
                    <span class="menu-title text-gray-700">Gérer les utilisateurs bloqués</span>
                </a>
            </div>
            <!--end::Menu item-->
            <!--begin::Menu separator-->
            <div class="separator my-2"></div>
            <!--end::Menu separator-->
            <div class="menu-heading px-5">
                <span class="fw-bold text-dark fs-4">Paramètre du système</span>
            </div>
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="/logout" class="menu-link px-5 fs-4">
                    <span class="menu-icon me-2">
                        <i class="fa-solid fa-power-off fs-3 text-gray-400"></i>
                    </span>
                    <span class="menu-title text-gray-700">Se déconnecter</span>
                </a>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::User account menu-->
        <!--end::Menu wrapper-->
    </div>
@else
    <div class="d-flex align-items-center me-lg-n2 ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
        <!--begin::Menu wrapper-->
        <div class="btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            <img class="h-30px w-30px rounded" src="{{ \Creativeorange\Gravatar\Facades\Gravatar::get('no-account@example.test') }}" alt="" />
        </div>
        <!--begin::User account menu-->
        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-auto" data-kt-menu="true">
            <div class="menu-heading px-5">
                <span class="fw-bold text-dark fs-4">Paramètre du système</span>
            </div>
            <!--begin::Menu item-->
            <div class="menu-item px-5">
                <a href="https://auth.{{ config('app.domain') }}/login?provider=lab" class="menu-link px-5 fs-4">
                    <span class="menu-icon me-2">
                        <i class="fa-solid fa-sign-in fs-3 text-gray-400"></i>
                    </span>
                    <span class="menu-title text-gray-700">Se connecter</span>
                </a>
            </div>
            <!--end::Menu item-->
        </div>
        <!--end::User account menu-->
        <!--end::Menu wrapper-->
    </div>
@endif

<!--end::User -->
