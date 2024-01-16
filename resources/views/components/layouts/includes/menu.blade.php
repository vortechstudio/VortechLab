<div class="d-flex align-items-stretch" id="header_nav">
    <div class="header-menu align-items-stretch"
         data-kt-drawer="true"
         data-kt-drawer-name="header-menu"
         data-kt-drawer-activate="{default: true, lg: false}"
         data-kt-drawer-overlay="true"
         data-kt-drawer-width="{default:'200px', '300px': '250px'}"
         data-kt-drawer-direction="start"
         data-kt-drawer-toggle="#header_menu_mobile_toggle"
         data-kt-swapper="true"
         data-kt-swapper-mode="prepend"
         data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">

        <div class="menu menu-rounded menu-column menu-lg-row menu-active-bg menu-title-gray-700 menu-state-primary menu-arrow-gray-500 fw-bold my-5 my-lg-0 align-items-stretch px-2 px-lg-0 fs-3" id="#header_menu" data-kt-menu="true">
            <div class="menu-item me-0 me-lg-2">
                <a href="{{ route('home') }}" class="menu-link {{ request()->route()->named('home') ? 'active' : '' }}" wire:navigate>Accueil</a>
            </div>
            <div class="menu-item menu-here-bg menu-lg-down-accordion me-0 me-lg-2" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start">
                                                <span class="menu-link py-3">
													<span class="menu-title">Cercles</span>
													<span class="menu-arrow d-lg-none"></span>
												</span>
                <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown p-0 w-100 w-lg-300px">
                    <div class="menu-state-bg menu-extended overflow-hidden overflow-lg-visible" data-kt-menu-dismiss="true">
                        @foreach($cercles as $cercle)
                            <div class="menu-item p-0 m-0">
                                <a href="" class="menu-link" wire:navigate>
                                                                    <span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
                                                                        <img src="{{ $cercle->image_icon }}" alt="" class="w-40px h-40px rounded-4">
                                                                    </span>
                                    <span class="d-flex flex-column">
                                                                        <span class="fs-6 fw-bold text-gray-800">{{ $cercle->name }}</span>
                                                                    </span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
