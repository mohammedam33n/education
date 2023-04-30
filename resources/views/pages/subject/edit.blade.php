@extends('master')


@push('css')
    <link href="{{ asset('adminAssets/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet"
          type="text/css"/>
@endpush

@section('breadcrumb')
    <div class="page-header">
        <div class="page-title">
            <h3>Edit Subject</h3>
        </div>
        <div class="dropdown filter custom-dropdown-icon">
            <a class="dropdown-toggle btn" href="#" role="button" id="filterDropdown" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"><span class="text"><span>Show</span> : Daily Analytics</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="filterDropdown">
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                   href="{{ route('admin.home') }}">Home</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                   href="{{ route('admin.subject.index') }}">Subjects</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Weekly Analytics"
                   href="{{ route('admin.subject.create') }}">Create Subject</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4 class="text-center text-success">Edit Subject</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="{{ route('admin.subject.update', $subject->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="teacher_id" value="{{ $subject->id }}">

                            <x-text name="name" label="الإسم" :value="$subject->name"/>

                            <div class="form-group row mb-4">
                                <label for="book"
                                       class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">Book</label>
                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                    <div class="custom-file-container" data-upload-id="myFirstImage1">
                                        <label>Upload <a href="javascript:void(0)"
                                                         class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                        <label class="custom-file-container__custom-file">
                                            <input type="file"
                                                   class="custom-file-container__custom-file__custom-file-input"
                                                   accept="application/pdf" name="book">
                                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
                                        <div class="custom-file-container__image-preview"></div>
                                    </div>
                                    @error('book')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="book" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">تعديل
                                    غلاف الكتاب</label>
                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                    <div class="custom-file-container" data-upload-id="myFirstImage2">
                                        <label>Upload <a href="javascript:void(0)"
                                                         class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                        <label class="custom-file-container__custom-file">
                                            <input type="file"
                                                   class="custom-file-container__custom-file__custom-file-input"
                                                   accept="image/*" name="avatar">
                                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
                                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                                        </label>
                                        <div class="custom-file-container__image-preview"></div>
                                    </div>
                                    @error('book')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success mt-3">Lets Go</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script src="{{ asset('adminAssets/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script>
        var firstUpload1 = new FileUploadWithPreview('myFirstImage1')
        var firstUpload2 = new FileUploadWithPreview('myFirstImage2')
    </script>
@endpush
