<div class="form-group row mb-4">
    <label for="brithday" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">{{ $label }}</label>
    <div class="col-xl-10 col-lg-9 col-sm-10">
        <input type="date" 
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