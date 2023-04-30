<div class="modal fade" id="creatGroupModal" tabindex="-1" role="dialog" aria-labelledby="creatGroupModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 mb-2 bg-primary">
                <h5 class="modal-title text-white" id="creatGroupModal">{{ __('group.Create Group') }}</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.group.store') }}" method="post">
                    @csrf

                    <x-text name="name" id="from_create" label="{{ __('group.name') }}" :value="old('name')" />


                    <x-time name="from" id="from_create" label="{{ __('group.from') }}" :value="old('from')" />

                    <x-time name="to" id="to_create" label="{{ __('group.to') }}" :value="old('to')" />

                    <div class="form-group row mb-4">
                        <label for="age_type" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">
                            {{ __('group.Choose teacher') }}
                        </label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <select class="form-control basic" style="width: 100%;" name="teacher_id" id="teacher_id">
                                <option value="">{{ __('group.Choose teacher') }}</option>
                                @foreach ($teachers as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('teacher_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="age_type"
                            class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">{{ __('group.Choose type of group') }}</label>

                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <select class="form-control basic" style="width: 100%;" name="group_type_id"
                                id="groupTypeId">
                                <option value="">{{ __('group.Choose type of group') }}</option>

                                @foreach ($groupTypes as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('group_type_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('group_type_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="age_type"
                            class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">{{ __('group.age type') }}</label>

                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <select class="form-control basic" style="width: 100%;" name="age_type" id="ageType">
                                <option value="">{{ __('group.age type') }}</option>
                                <option value="Kid" {{ old('age_type') == 'Kid' ? 'selected' : '' }}>
                                    {{ __('group.kid') }} </option>
                                <option value="Adult" {{ old('age_type') == 'Adult' ? 'selected' : '' }}>
                                    {{ __('group.adult') }} </option>
                            </select>
                            @error('age_type')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('globalWorld.Save') }}</button>
                        <button class="btn" data-dismiss="modal"><i
                                class="flaticon-cancel-12"></i>{{ __('globalWorld.Discard') }}</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
