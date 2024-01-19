<div id="header" class="header align-items-stretch mb-5 mb-lg-10"
     data-kt-sticky="true"
     data-kt-sticky-name="header"
     data-kt-sticky-offset="{default: '200px', lg: '300px'}">

    <div class="container-fluid d-flex align-items-center bg-opacity-75 bg-light text-inverse-light">
        <div class="d-flex topbar align-items-center d-lg-none ms-n2 me-3" data-bs-toggle="tooltip" data-bs-original-title="Voir le menu">
            <div class="btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px" id="header_menu_mobile_toggle">
                <i class="ki-duotone ki-abstract-14 fs-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </div>
        </div>
        <div class="header-logo me-5 me-md-10 flex-grow-1 flex-lg-grow-0">
            <a href="/">
                <img src="{{ asset('/storage/logo.png') }}" alt="Logo" class="logo-default h-35px" />
                <img src="{{ asset('/storage/logo.png') }}" alt="Logo Sticky" class="logo-sticky h-25px" />
            </a>
        </div>
        <div class="d-flex justify-content-between align-items-stretch flex-grow-1">
            <x-layouts.includes.menu />
            <livewire:component.search-input />
            <div class="topbar d-flex align-items-stretch flex-shrink-0">
                <!--begin::Notifications-->
                <livewire:component.notification />
                <!--end::Notifications-->
                <!--begin::Quick links-->
                <div class="d-flex align-items-center ms-1 ms-lg-3">
                    <!--begin::Menu wrapper-->
                    <div class="btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-element-11 fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </div>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column w-250px w-lg-325px" data-kt-menu="true">
                        @auth()
                            <!--begin:Nav-->
                            <div class="row g-0">
                                <!--begin:Item-->
                                <div class="col-4">
                                    <a href="{{ route('posts.create', 'text') }}" wire:navigate class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
                                        <i class="fa-solid fa-pencil-alt fs-3x text-primary mb-2"></i>
                                        <span class="fs-5 fw-semibold text-gray-800 mb-0">Texte</span>
                                    </a>
                                </div>
                                <!--end:Item-->
                                <div class="col-4">
                                    <a href="{{ route('posts.create', 'image') }}" wire:navigate class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
                                        <i class="fa-solid fa-image fs-3x text-primary mb-2"></i>
                                        <span class="fs-5 fw-semibold text-gray-800 mb-0">Images</span>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="{{ route('posts.create', 'video') }}" wire:navigate class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
                                        <i class="fa-solid fa-video fs-3x text-primary mb-2"></i>
                                        <span class="fs-5 fw-semibold text-gray-800 mb-0">Vidéo</span>
                                    </a>
                                </div>
                            </div>
                            <!--end:Nav-->
                            <!--begin::View more-->
                            <div class="py-2 text-center border-top">
                                <a href="pages/user-profile/activity.html" class="btn btn-color-gray-600 btn-active-color-primary">Brouillon (0)
                                    <i class="ki-duotone ki-arrow-right fs-5">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i></a>
                            </div>
                            <!--end::View more-->
                        @else
                            <div class="row g-0">
                                <!--begin:Item-->
                                <div class="col-4">
                                    <a href="{{ route('posts.create', 'text') }}" wire:navigate class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
                                        <i class="fa-solid fa-pencil-alt fs-3x text-primary mb-2"></i>
                                        <span class="fs-5 fw-semibold text-gray-800 mb-0">Texte</span>
                                    </a>
                                </div>
                                <!--end:Item-->
                                <div class="col-4">
                                    <a href="{{ route('posts.create', 'image') }}" wire:navigate class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
                                        <i class="fa-solid fa-image fs-3x text-primary mb-2"></i>
                                        <span class="fs-5 fw-semibold text-gray-800 mb-0">Images</span>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="{{ route('posts.create', 'video') }}" wire:navigate class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
                                        <i class="fa-solid fa-video fs-3x text-primary mb-2"></i>
                                        <span class="fs-5 fw-semibold text-gray-800 mb-0">Vidéo</span>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <!--end::Menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::Quick links-->
                <!--begin::Theme mode-->
                <div class="d-flex align-items-center ms-1 ms-lg-3">
                    <!--begin::Menu toggle-->
                    <a href="#" class="btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-night-day theme-light-show fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                            <span class="path6"></span>
                            <span class="path7"></span>
                            <span class="path8"></span>
                            <span class="path9"></span>
                            <span class="path10"></span>
                        </i>
                        <i class="ki-duotone ki-moon theme-dark-show fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </a>
                    <!--begin::Menu toggle-->
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-duotone ki-night-day fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
															<span class="path4"></span>
															<span class="path5"></span>
															<span class="path6"></span>
															<span class="path7"></span>
															<span class="path8"></span>
															<span class="path9"></span>
															<span class="path10"></span>
														</i>
													</span>
                                <span class="menu-title">Light</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-duotone ki-moon fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
														</i>
													</span>
                                <span class="menu-title">Dark</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
													<span class="menu-icon" data-kt-element="icon">
														<i class="ki-duotone ki-screen fs-2">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
															<span class="path4"></span>
														</i>
													</span>
                                <span class="menu-title">System</span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Theme mode-->
                <x-layouts.includes.userBlock />
                <!--begin::Aside mobile toggle-->
                <!--end::Aside mobile toggle-->
            </div>
        </div>
    </div>
</div>
