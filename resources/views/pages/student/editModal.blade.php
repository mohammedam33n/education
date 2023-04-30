<div class="modal fade" id="editStudent" tabindex="-1" role="dialog" aria-labelledby="editStudent" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 mb-2 bg-warning ">
                <h5 class="modal-title text-white" id="editStudent">تعديل بيانات الطالب</h5>
            </div>
            <div class="modal-body">
                <form id="editStudentForm" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <x-text name="name" label="الإسم" id="name" />

                    <x-date name="birthday" label="تاريخ الميلاد" id="birthday" />

                    <x-text name="phone" label="الهاتف" id="phone" />

                    <x-text name="qualification" label="المؤهل" id="qualification" />

                    <div class="custom-file-container" data-upload-id="mySecondImage">
                        <label>Upload (Image) <a href="javascript:void(0)" class="custom-file-container__image-clear"
                                title="Clear Image"></a></label>
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
                        <button type="submit" class="btn btn-warning">Save</button>
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Discard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
