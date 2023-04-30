@extends('master')

@push('css')
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('adminAssets/plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <!-- END THEME GLOBAL STYLES -->
@endpush

@section('breadcrumb')
    <div class="page-header">
        <div class="page-title">
            <h3>{{ __('home.Analytics Dashboard') }}</h3>
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
                <a class="dropdown-item" data-value="<span>Show</span> : Daily Analytics" href="javascript:void(0);">Daily
                    Analytics</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Weekly Analytics" href="javascript:void(0);">Weekly
                    Analytics</a>
                <a class="dropdown-item" data-value="<span>Show</span> : Monthly Analytics"
                    href="javascript:void(0);">Monthly Analytics</a>
                <a class="dropdown-item" data-value="Download All" href="javascript:void(0);">Download All</a>
                <a class="dropdown-item" data-value="Share Statistics" href="javascript:void(0);">Share Statistics</a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="text-center w-100">
        <div class="px-3" id="paymentsThisMonthContainer"
            data-href="{{ route('admin.payment.getPaymentPerMonthThisYear') }}">

            <div class="row align-items-center">
                <div class="col-8 layout-spacing" id="canvas">
                    <div id="content-tables-search">
                        <!-- content tables search -->
                    </div>
                    <canvas id="paymentsThisMonthChart">
                        <!-- payments this month chart -->
                    </canvas>
                </div>

                <div class="col-4 layout-spacing">
                    <div class="" id="paymentsThisMonthContainerGroup" data-href="{{ route('admin.getDataAjax') }}">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing" id="canvas">
                            <canvas id="paymentsThisMonthChartOnGroupShow"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>





    </div>
@endsection


@push('js')
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('adminAssets/plugins/flatpickr/flatpickr.js') }}"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/home.js') }}"></script>
    <script src="{{ asset('js/payment_chart.js') }}"></script>
@endpush
