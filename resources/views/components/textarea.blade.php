<div class="form-group row mb-4">

    <label for="note"
           class="col-md-12  col-form-label {{$labelClass ?? 'text-primary'}} ">
        {{ $label }}
    </label>

    <div class="col-md-12">

        <textarea class="form-control " cols="30" rows="10" name="{{ $name }}" id="{{ $name }}">{{ $value }}</textarea>
        @error($name)
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>
</div>