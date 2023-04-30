<div class="form-group row mb-4">
    <label for="from"
        class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary {{ $class ?? '' }}">{{ $label }}</label>
    <div class="col-xl-10 col-lg-9 col-sm-10">
        <input id="{{ $id ?? $name }}" value="{{ $value }}" class="form-control flatpickr flatpickr-input active"
            type="time" name="{{ $name }}">
        @error($name)
            <p class="text-danger">{{ $message }}</p>
        @enderror

    </div>
</div>
