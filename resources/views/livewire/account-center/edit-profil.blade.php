@push("styles")
    <style>
        .image-input-placeholder {
            background-image: url('{{ $user->info->social->profil_img_link }}');
        }

        [data-bs-theme="dark"] .image-input-placeholder {
            background-image: url('{{ $user->info->social->profil_img_link }}');
        }
    </style>
@endpush
<form action="" wire:submit="save" enctype="multipart/form-data">
    <div class="card shadow-lg" x-data="{show_edit_avatar: false, show_edit_couverture: false}">
        <div class="card-header">
            <div class="card-title">Modifier votre profil</div>
            <div class="card-toolbar">
                <a href="{{ route('accountCenter.postList') }}" wire:navigate class="btn btn-outline btn-outline-dark rounded-full">
                    <i class="fa-solid fa-arrow-circle-left me-3"></i>
                    <span>Retour</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div wire:ignore class="d-flex flex-row justify-content-center align-items-center gap-10">
                <div class="image-input image-input-circle mb-5" data-kt-image-input="true" style="background-image: url({{ $user->info->social->profil_img_link }})">
                    <!--begin::Image preview wrapper-->
                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ $user->info->social->profil_img_link }})"></div>
                    <!--end::Image preview wrapper-->

                    <!--begin::Edit button-->
                    <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                           data-kt-image-input-action="change"
                           data-bs-toggle="tooltip"
                           data-bs-dismiss="click"
                           title="Change avatar">
                        <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>

                        <!--begin::Inputs-->
                        <input type="file" wire:model="profil_img" name="profil_img" accept=".png, .jpg, .jpeg" />
                        <input type="hidden" name="avatar_remove" />
                        <!--end::Inputs-->
                    </label>
                    <!--end::Edit button-->

                    <!--begin::Cancel button-->
                    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                          data-kt-image-input-action="cancel"
                          data-bs-toggle="tooltip"
                          data-bs-dismiss="click"
                          title="Cancel avatar">
                        <i class="ki-outline ki-cross fs-3"></i>
                    </span>
                    <!--end::Cancel button-->

                    <!--begin::Remove button-->
                    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                          data-kt-image-input-action="remove"
                          data-bs-toggle="tooltip"
                          data-bs-dismiss="click"
                          title="Remove avatar">
                        <i class="ki-outline ki-cross fs-3"></i>
                    </span>
                    <!--end::Remove button-->
                </div>
                <div class="image-input" data-kt-image-input="true" style="background-image: url({{ $user->info->social->header_img_link }})">
                    <!--begin::Image preview wrapper-->
                    <div class="image-input-wrapper w-325px h-125px" style="background-image: url({{ $user->info->social->header_img_link }})"></div>
                    <!--end::Image preview wrapper-->

                    <!--begin::Edit button-->
                    <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                           data-kt-image-input-action="change"
                           data-bs-toggle="tooltip"
                           data-bs-dismiss="click"
                           title="Change avatar">
                        <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>

                        <!--begin::Inputs-->
                        <input type="file" name="header_img" wire:model="header_img" accept=".png, .jpg, .jpeg" />
                        <input type="hidden" name="avatar_remove" />
                        <!--end::Inputs-->
                    </label>
                    <!--end::Edit button-->

                    <!--begin::Cancel button-->
                    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                          data-kt-image-input-action="cancel"
                          data-bs-toggle="tooltip"
                          data-bs-dismiss="click"
                          title="Cancel avatar">
                        <i class="ki-outline ki-cross fs-3"></i>
                    </span>
                    <!--end::Cancel button-->

                    <!--begin::Remove button-->
                    <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                          data-kt-image-input-action="remove"
                          data-bs-toggle="tooltip"
                          data-bs-dismiss="click"
                          title="Remove avatar">
                        <i class="ki-outline ki-cross fs-3"></i>
                    </span>
                    <!--end::Remove button-->
                </div>
                <!--end::Image input-->
            </div>
            <x-form.input
                name="name"
                label="Pseudo"
                hint="Votre pseudo doit être unique / Vous pouvez modifier votre pseudo 1 fois par mois. Cette possibilité de modification est mise à jour le premier jour du mois (UTC+2)." />

            <x-form.textarea
                name="signature"
                label="Signature"
                hint="Votre signature est un texte qui sera affiché sous vos posts." />
        </div>
        <div class="card-footer pb-5">
            <div class="d-flex flex-wrap justify-content-center align-items-center">
                <x-form.button
                    text-submit="Enregistrer"
                    class-color="light-primary"
                    size="lg"
                    rounded="3" />
            </div>
        </div>
    </div>
</form>
