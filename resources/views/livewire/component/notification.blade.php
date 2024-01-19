<div class="d-flex align-items-center ms-1 ms-lg-3">
    <!--begin::Menu- wrapper-->
    <div class="position-relative btn btn-icon btn-active-light-primary btn-custom w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
        <i class="ki-duotone ki-binance fs-1">
            <span class="path1"></span>
            <span class="path2"></span>
            <span class="path3"></span>
            <span class="path4"></span>
            <span class="path5"></span>
        </i>
    </div>
    <!--begin::Menu-->
    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true" id="kt_menu_notifications">
        @if(!empty($user->user))
            <!--begin::Heading-->
            <div class="d-flex flex-column bgi-no-repeat rounded-top" style="background-image:url('/assets/media/misc/menu-header-bg.jpg')">
                <!--begin::Title-->
                <h3 class="text-white fw-semibold px-9 mt-10 mb-6">Notifications
                    <span class="fs-8 opacity-75 ps-3">24 reports</span></h3>
                <h3 class="text-white fw-semibold px-9 mt-10 mb-6">
                    Message de notification
                    <span class="fs-8 opacity-75 ps-3">({{ $user->user->unreadNotifications()->count() }})</span>
                </h3>
                <!--end::Title-->
            </div>
            <!--end::Heading-->
            <!--begin::Items-->
            <div class="scroll-y mh-325px my-5 px-8">
                @foreach($user->user->unreadNotifications()->take(10)->get() as $notification)
                    <!--begin::Item-->
                    <div class="d-flex flex-stack py-4">
                        <!--begin::Section-->
                        <div class="d-flex align-items-center">
                            <!--begin::Symbol-->
                            <div class="symbol symbol-35px me-4">
							<span class="symbol-label bg-light-{{ $notification->data['type'] }}">
								<i class="ki-duotone ki-abstract-28 fs-2 text-primary">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
							</span>
                            </div>
                            <!--end::Symbol-->
                            <!--begin::Title-->
                            <div class="mb-0 me-2">
                                <a href="#" class="fs-6 text-gray-800 text-hover-{{ $notification->data['type'] }} fw-bold">{{ $notification->data['title'] }}</a>
                                <div class="text-gray-500 fs-7">{{ $notification->data['description'] }}</div>
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Label-->
                        <span class="badge badge-light fs-8">1 hr</span>
                        <!--end::Label-->
                    </div>
                    <!--end::Item-->
                @endforeach
            </div>
            <!--end::Items-->
            <!--begin::View more-->
            <div class="py-3 text-center border-top">
                <a href="#" class="btn btn-color-gray-600 btn-active-color-primary">Voir toutes les notifications
                    <i class="ki-duotone ki-arrow-right fs-5">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i></a>
            </div>
            <!--end::View more-->
        @else
            <div class="d-flex flex-column justify-content-center align-items-center py-10 px-5 mx-auto">
                <i class="fa-regular fa-xmark-circle fs-5tx text-danger mb-5"></i>
                <span class="text-muted mb-5">Connectez-vous pour découvrir davantage de contenu intéressant</span>
                <a href="https://auth.{{ config('app.domain') }}/login?provider=lab" class="btn btn-sm btn-circle btn-light-primary">Connexion</a>
            </div>
        @endif
    </div>
    <!--end::Menu-->
    <!--end::Menu wrapper-->
</div>
