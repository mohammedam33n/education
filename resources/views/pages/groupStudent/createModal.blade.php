<div class="modal fade" id="creatGroupStudentModal" tabindex="-1" role="dialog" aria-labelledby="creatGroupStudentModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 mb-2 bg-primary">
                <h5 class="modal-title text-white" id="creatGroupStudentModal">{{ __('group.Create Group Student') }}
                </h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.group_students.store') }}" method="post">
                    @csrf
                    @if (!isset($group))
                        <div class="form-group row mb-4">
                            <label for="age_type" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">
                                {{ __('group.Choose group') }}
                            </label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                <select class="form-control basic" style="width: 100%;" name="group_id" id="group_id"
                                    data-href="{{ route('admin.group_students.getGroupStudents') }}">
                                    <option value=""> {{ __('group.Choose group') }}</option>
                                    @foreach ($groups as $group)
                                        <option value="{{ $group->id }}"
                                            {{ old('group_id') == $group->id ? 'selected' : '' }}>
                                            {{ $group->ffrom }} :
                                            {{ $group->fto }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('group_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    @else
                        <input type="hidden" name="group_id" id="group_id" value="{{ $group->id }}"
                            data-groupid="{{ $group->id }}">
                    @endif
                    <div class="form-group row mb-4">
                        <label for="age_type" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">
                            {{ __('group.Choose student') }}
                        </label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <select class="form-control basic" style="width: 100%;" name="student_id" id="student_id">
                                <option value=""> {{ __('group.Choose student') }}</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}"
                                        {{ old('student_id') == $student->id ? 'selected' : '' }}>
                                        {{ $student->name }}</option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"> {{ __('globalWorld.Save') }}</button>
                        <button class="btn" data-dismiss="modal"><i
                                class="flaticon-cancel-12"></i>{{ __('globalWorld.Discard') }}</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
