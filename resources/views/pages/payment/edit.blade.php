@extends('master')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('adminAssets/plugins/select2/select2.min.css')}}">

@endpush
@section('breadcrumb')
    <div class="page-header">
        <div class="page-title">
            <h3>Edit Exam</h3>
        </div>
        <div class="dropdown filter custom-dropdown-icon">
            <a class="dropdown-toggle btn" href="#" role="button" id="filterDropdown" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"><span class="text"><span>Show</span> : Daily
                    Analytics</span>
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
                   href="{{ route('admin.exam.index') }}">Exams</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Weekly Analytics"
                   href="{{ route('admin.exam.create') }}">Create Exam</a>
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
                                <h4 class="text-center text-primary">Edit Exam</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="{{ route('admin.exam.update',$exam->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="exam_id" value="{{ $exam->id }}">


                            <div class="form-group row mb-4">
                                <label for="age_type" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">
                                    اختر
                                    الطالب</label>
                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                    <select class="form-control basic"
                                            style="width: 100%;"
                                            name="student_id" id="student_id">
                                        <option value=""> الطالب</option>
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}"
                                                    {{ $exam->student_id == $student->id ? 'selected' : '' }}>
                                                {{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                    @error("student_id")
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label for="age_type" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">
                                    اختر
                                    المجموعة</label>
                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                    <select class="form-control basic"
                                            style="width: 100%;"
                                            name="group_id" id="group_id">
                                        <option value=""> المجموعة</option>
                                        @foreach ($groups as $group)
                                            <option value="{{ $group->id }}"
                                                    {{ $exam->group_id == $group->id ? 'selected' : '' }}>
                                                {{ $group->from }} :
                                                {{ $group->to }} </option>
                                        @endforeach
                                    </select>
                                    @error("group_id")
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label for="age_type" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary"> من
                                    درس
                                </label>
                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                    <select class="form-control basic"
                                            style="width: 100%;"
                                            name="lesson_from" id="lesson_from">
                                        <option value=""> من الدرس</option>
                                        @foreach ($lessons as $lesson)
                                            <option value="{{ $lesson->id }}"
                                                    {{  $exam->lesson_from == $lesson->id ? 'selected' : '' }}>
                                                {{ $lesson->title }}</option>
                                        @endforeach
                                    </select>
                                    @error("lesson_from")
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="age_type" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">
                                    الى درس
                                </label>
                                <div class="col-xl-10 col-lg-9 col-sm-10">
                                    <select class="form-control basic"
                                            style="width: 100%;"
                                            name="lesson_to" id="lesson_to">
                                        <option value=""> الى الدرس</option>
                                        @foreach ($lessons as $lesson)
                                            <option value="{{ $lesson->id }}"
                                                    {{  $exam->lesson_to == $lesson->id ? 'selected' : '' }}>
                                                {{ $lesson->title }}</option>
                                        @endforeach
                                    </select>
                                    @error("lesson_to")
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary mt-3">Lets Go</button>
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
    <script src="{{asset('adminAssets/plugins/select2/select2.min.js')}}"></script>
    <script>
        $(".basic").select2({
            tags: true,
        });
    </script>
@endpush