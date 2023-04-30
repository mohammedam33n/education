@extends('master')

@push('css')
    <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('adminAssets/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('adminAssets/plugins/table/datatable/custom_dt_custom.css') }}">
    <!-- END PAGE LEVEL CUSTOM STYLES -->
@endpush

@section('breadcrumb')
    <div class="page-header">
        <div class="page-title">
            <h3>Subjects Table</h3>

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
                   href="{{ route('admin.subject.index') }}">Subjects</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Weekly Analytics"
                   href="{{ route('admin.subject.create') }}">Create Subject</a>
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
                                <h4>Subjects</h4>
                            </div>
                            <div class="col-xl-2 col-md-2 col-sm-2 col-2">
                                <a href="{{ route('admin.subject.create') }}"
                                   class="btn btn-primary float-right">Create</a>
                            </div>
                        </div>
                        <div class="table-responsive mb-4">
                            <div id="style-3_wrapper"
                                 class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="style-3" class="table style-3  table-hover">
                                            <thead>
                                            <tr>
                                                <th class="checkbox-column text-center"> Id</th>
                                                <th class="text-center">Image</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Book</th>
                                                <th class="text-center">Edit</th>
                                                <th class="text-center">Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($subjects as $subject)
                                                <tr role="row">
                                                    <td class="checkbox-column text-center sorting_1">
                                                        {{ $subject->id }} </td>
                                                    <td>
                                                        <img src="{{ $subject->avatar }}" alt=""
                                                             class="avatar-image">
                                                    </td>
                                                    <td>{{ $subject->name }}</td>
                                                    <td>
                                                        <a href="{{ $subject->book }}" target="__blank">
                                                            <svg viewBox="0 0 24 24" width="24" height="24"
                                                                 stroke="currentColor" stroke-width="2" fill="none"
                                                                 stroke-linecap="round" stroke-linejoin="round"
                                                                 class="css-i6dzq1">
                                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4">
                                                                </path>
                                                                <polyline points="7 10 12 15 17 10"></polyline>
                                                                <line x1="12" y1="15" x2="12"
                                                                      y2="3"></line>
                                                            </svg>
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="links--ul text-center">
                                                            <x-edit-link
                                                                    :route="route('admin.subject.edit', $subject->id)"/>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="links--ul text-center">
                                                            <x-delete-link
                                                                    :route="route('admin.subject.delete', $subject->id)"/>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('adminAssets/plugins/table/datatable/datatables.js') }}"></script>
    <script>
        // var e;
        c3 = $('#style-3').DataTable({
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
                },
                "sInfo": "Showing page _PAGE_ of _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "Search...",
                "sLengthMenu": "Results :  _MENU_",
            },
            "stripeClasses": [],
            "lengthMenu": [5, 10, 20, 50],
            "pageLength": 5,
        });

        multiCheck(c3);
    </script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endpush
