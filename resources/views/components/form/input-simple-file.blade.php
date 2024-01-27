@push('styles')
    <style>
        .image-input-placeholder {
            background-image: url('https://placehold.co/325x125');
        }

        [data-bs-theme="dark"] .image-input-placeholder {
            background-image: url('https://placehold.co/325x125');
        }
    </style>
@endpush
<div class="mb-10 mt-2" wire:ignore>
    <div class="image-input {{ !$defaultImg ?? 'image-input-empty'  }} border border-gray-500 rounded-3" data-kt-image-input="true" @if($defaultImg) style="background-image: url('{{ $imgFile }}')" @endif>
        <!--begin::Image preview wrapper-->
        <div class="image-input-wrapper w-325px h-125px" @if($defaultImg) style="background-image: url('{{ $imgFile }}')" @endif></div>
        <!--end::Image preview wrapper-->

        <!--begin::Edit button-->
        <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
               data-kt-image-input-action="change"
               data-bs-toggle="tooltip"
               data-bs-dismiss="click"
               title="Modifier {{ $texting }}">
            <i class="ki-duotone ki-pencil fs-6">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>

            <!--begin::Inputs-->
            <input
                type="file"
                name="{{ $name }}"
                accept="{{ $accept }}"
                @if($required) required @endif
                wire:model="{{ $isModel ? $model.'.'.$name : $name }}"/>

            <input type="hidden" name="avatar_remove" />
            <!--end::Inputs-->
        </label>
        <!--end::Edit button-->

        <!--begin::Cancel button-->
        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
              data-kt-image-input-action="cancel"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="Annuler {{ $texting }}">
        <i class="ki-outline ki-cross fs-3"></i>
    </span>
        <!--end::Cancel button-->

        <!--begin::Remove button-->
        <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
              data-kt-image-input-action="remove"
              data-bs-toggle="tooltip"
              data-bs-dismiss="click"
              title="Supprimer {{ $texting }}">
        <i class="ki-outline ki-cross fs-3"></i>
    </span>
        <!--end::Remove button-->
    </div>
</div>


