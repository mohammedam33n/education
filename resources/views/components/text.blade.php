<div class="form-group row mb-4">
    <label for="name"
           class="col-xl-12 col-form-label {{$labelClass ?? 'text-primary'}}">{{ $label }}</label>
    <div class="col-xl-12">
        <input type="text"
               class="form-control {{$class ?? ''}}"
               id="{{$id ?? $name}}"
               placeholder=""
               name="{{ $name }}"
               value="{{$value ?? ''}}">
        @error($name)
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
</div>