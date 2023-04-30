@extends('master')


@push('css')
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/plugins/table/datatable/dt-global_style.css') }}">
    <!-- END PAGE LEVEL CUSTOM STYLES -->
@endpush


@section('breadcrumb')
    <div class="page-header">
        <div class="page-title">
            <h3>{{ __('group.Group Students Table') }}</h3>

        </div>
        <div class="dropdown filter custom-dropdown-icon">
            <a class="dropdown-toggle btn" href="#" role="button" id="filterDropdown" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"><span class="text"><span>{{ __('globalWorld.Show') }}</span> :
                    {{ __('globalWorld.Dail Analytics') }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="filterDropdown">
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                    href="{{ route('admin.home') }}">{{ __('globalWorld.HOME') }}</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics"
                    href="{{ route('admin.group_students.index') }}">{{ __('group.Group Students') }}</a>
                {{-- <a class="dropdown-item" data-value="<span>Show</span> : Weekly Analytics"
                    href="{{ route('admin.group_students.create') }}">{{ __('group.Create Group Student') }}</a> --}}
            </div>
        </div>
    </div>
@endsection



@section('content')
    <div class="container-fluid">
        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">

                    </div>
                    <div class="widget-content widget-content-area">
                        <div class="row align-items-center">
                            <div class="col-xl-10 col-md-10 col-sm-10 col-10">
                                <h4>{{ __('group.Group Students') }}</h4>
                            </div>
                            <div class="col-xl-2 col-md-2 col-sm-2 col-2">
                                <a class="btn btn-primary float-right" data-toggle="modal"
                                    data-target="#creatGroupStudentModal">{{ __('group.Create Group Student') }}</a>
                            </div>
                        </div>
                        <div class="table-responsive mb-4">
                            <div id="style-3_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        {!! $dataTable->table(
                                            [
                                                'class' => 'table',
                                            ],
                                            true,
                                        ) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.groupStudent.createModal')
@endsection


@push('js')
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="{{ asset('adminAssets/plugins/table/datatable/datatables.js') }}"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{ asset('adminAssets/plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <script src="/vendor/datatables/buttons.server-side.js"></script>



    {!! $dataTable->scripts() !!}

    <script>
        $('#group_id').on('change', function() {
            let href = $(this).data('href');
            let group_id = $(this).val();
            $(`option`).removeAttr('disabled').css({
                'color': 'black'
            });
            $.ajax({
                url: href,
                data: {
                    group_id
                },
                success: function(response) {
                    let groupStudents = response.groupStudents

                    groupStudents.forEach(element => {
                        let student = element.student_id

                        $(`#student_id option[value=${student}]`).attr('disabled', true).css({
                            'color': 'red'
                        })
                    });
                },
                error: function() {}
            })
        })
    </script>
@endpush
