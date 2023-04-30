<div class="modal fade" id="creatLessonModal" tabindex="-1" role="dialog" aria-labelledby="creatLessonModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="creatLessonModal">إضافة درس</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.lesson.store') }}" method="post">
                    @csrf

                    <div class="form-group row mb-4">
                        <label for="age_type" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary"> اختر
                            المادة</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <select class="form-control basic" style="width: 100%;" name="subject_id" id="subject_id">
                                <option value="">اختر المادة</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('subject_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <x-text name="title" label="عنوان الدرس" :value="old('title')" />

                    <div class="form-group row mb-4">
                        <label for="name" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">بداية
                            الصفحة</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="number" class="form-control" placeholder="" name="from_page"
                                :value="old('from_page')" min="0" max="">
                            @error('from_page')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="name" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">نهاية
                            الصفحة</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="number" class="form-control" placeholder="" name="to_page" min="0"
                                max="" :value="old('to_page')">
                            @error('to_page')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="name" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">عدد
                            الايات</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <input type="number" class="form-control" placeholder="" name="chapters_count"
                                min="0" max="" :value="old('chapters_count')">
                            @error('chapters_count')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Discard</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
