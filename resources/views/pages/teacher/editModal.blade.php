<div class="modal fade" id="editTeacher" tabindex="-1" role="dialog" aria-labelledby="editTeacher" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 mb-2 bg-warning ">
                <h5 class="modal-title text-white" id="editTeacher">{{ __('teacher.edite teacher') }}</h5>
            </div>
            <div class="modal-body">
                <form id="editTeacherForm" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <x-text name="name" label="{{ __('teacher.name') }}" id="name" />

                    <x-date name="birthday" label="{{ __('teacher.birthday') }}" id="birthday" />

                    <x-text name="phone" label="{{ __('teacher.phone') }}" id="phone" />

                    <x-text name="qualification" label="{{ __('teacher.qualification') }}" id="qualification" />

                    <div class="custom-file-container" data-upload-id="mySecondImage">
                        <label>{{ __('teacher.avatar') }}<a href="javascript:void(0)"
                                class="custom-file-container__image-clear" title="Clear Image"></a></label>
                        <label class="custom-file-container__custom-file">
                            <input type="file" class="custom-file-container__custom-file__custom-file-input"
                                accept="image/*" name="avatar">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                            <span class="custom-file-container__custom-file__custom-file-control">
                                {{-- here is center  html js but not work --}}
                            </span>
                        </label>
                        <div class="custom-file-container__image-preview">
                            {{-- here is center tag img but not work --}}
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning">{{ __('teacher.Save') }}</button>
                        <button class="btn" data-dismiss="modal"><i
                                class="flaticon-cancel-12"></i>{{ __('teacher.Discard') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
