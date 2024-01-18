<div class="mb-10">
    @if(!$noLabel)
    <label for="{{ $name }}" class="form-label {{ $required ? 'required' : '' }}">{{ $label }}</label>
    @endif
    <input
        type="{{ $type }}"
        id="{{ $name }}"
        wire:model.prevent="{{ $isModel ? $model.'.'.$name : $name }}"
        name="{{ $name }}"
        placeholder="{{ $required && $noLabel ? ($placeholder ? $placeholder.'*' : $label.'*') : ($placeholder ? $placeholder : $label) }}"
        class="form-control {{ $class }} @error("$name") is-invalid @enderror"
        value="{{ $value }}"
        @if(isset($mask)) data-inputmask="{{ $mask }}" @endif
        @if($maxlength != 0) maxlength="{{ $maxlength }}" @endif>
    @error("$name")
        <span class="text-danger error">{{ $message }}</span>
    @enderror
    @if(isset($hint))
        <p>{{ $hint }}</p>
    @endif
</div>

@if($maxlength != 0)
    @section("scripts")
        <script>
            document.addEventListener('livewire:initialized', () => {
                $("#title").maxlength({
                    alwaysShow: true,
                    threshold: 10,
                    warningClass: "badge bg-warning",
                    limitReachedClass: "badge bg-danger",
                });
            })
        </script>
    @endsection
@endif
