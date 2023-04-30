@extends('master')

@push('css')

    <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('adminAssets/plugins/table/datatable/dt-global_style.css') }}">

@endpush



@section('content')
    <div class="container-fluid">
        <div class="row layout-spacing">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="text-capitalize">
                            {{__('roles.roles')}}
                        </h3>
                        <a class="icon" href="{{route('admin.role.create')}}">
                            <i class="fa-solid fa-plus fa-2xl"></i>
                        </a>
                    </div>
                    <div class="card-body">
                        {!! $dataTable->table
                            ([
                                     'class' => 'table table-striped text-center',
                                     'style' => 'width:100%'
                                 ],true,
                            )
                        !!}
                    </div>
                    <div class="card-footer">
                        test
                    </div>

                </div>
            </div>
        </div>
    </div>
    
@endsection


@push('js')

    <script src="{{ asset('adminAssets/plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('adminAssets/plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables/buttons.server-side.js')}}"></script>
    <script src="{{ asset('/js/role.js')}}"></script>

    {!! $dataTable->scripts() !!}
@endpush
