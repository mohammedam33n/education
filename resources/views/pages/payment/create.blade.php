@extends('master')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('adminAssets/plugins/select2/select2.min.css') }}">
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('adminAssets/assets/css/apps/invoice.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('adminAssets/assets/css/apps/invoice.css') }}" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="{{ asset('adminAssets/assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link rel="{{ asset('adminAssets/stylesheet" type="text/css') }}" href="plugins/select2/select2.min.css">
    <!--  END CUSTOM STYLE FILE  -->
@endpush

@section('content')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row invoice layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="app-hamburger-container">
                        <div class="hamburger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-menu chat-menu d-xl-none">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </div>
                    </div>
                    <div class="doc-container">
                        <div class="tab-title">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <div class="search">
                                        <input type="text" class="form-control" placeholder="Search">
                                    </div>
                                    <ul class="nav nav-pills inv-list-container d-block ps ps--active-y" id="pills-tab"
                                        role="tablist">
                                        @foreach ($gorups as $group)
                                            <li class="nav-item">
                                                <div class="nav-link list-actions" id="invoice-{{ $group->id }}"
                                                    data-invoice-id="00001">
                                                    <div class="f-m-body">
                                                        <div class="f-head">

                                                        </div>
                                                        <div class="f-body">
                                                            <p class="invoice-number"></p>
                                                            <p
                                                                class="alert {{ $group->allStudentsPaid ? 'alert-success' : 'alert-danger' }}">
                                                                Group {{ $group->id }}
                                                                {{ $group->allStudentsPaid ? 'All paid this month' : 'Not All Paid this month' }}
                                                            </p>
                                                            <p class="invoice-customer-name badge bg-primary text-light">
                                                                <span class="text-light">From:</span>{{ $group->from }}
                                                            </p>
                                                            <p class="invoice-customer-name badge bg-warning text-light">
                                                                <span class="text-light">To:</span>
                                                                {{ $group->to }}
                                                            </p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach


                                        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                        </div>
                                        <div class="ps__rail-y" style="top: 0px; height: 409px; right: 0px;">
                                            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 112px;">
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="invoice-container">
                            <div class="invoice-inbox ps ps--active-y" style="height: calc(100vh - 215px);">

                                <div id="ct" class="" style="display: block;">
                                    @foreach ($gorups as $group)
                                        <div class="invoice-{{ $group->id }}" style="display: none;">
                                            <div class="content-section  animated animatedFadeInUp fadeInUp">
                                                <div class="row inv--head-section">

                                                    <div class="col-sm-6 col-12">
                                                        <h3 class="in-heading">STUDNTS</h3>
                                                    </div>
                                                    <div class="col-sm-6 col-12 align-self-center text-sm-right">
                                                        <div class="company-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-hexagon">
                                                                <path
                                                                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                                                </path>
                                                            </svg>
                                                            <h5 class="inv-brand-name">Payment</h5>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row inv--product-table-section">
                                                    <div class="col-6">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead class="">
                                                                    <tr>
                                                                        <th scope="col">S.No</th>
                                                                        <th scope="col">Name</th>
                                                                        <th scope="col">paid</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($group->students as $student)
                                                                        <tr>
                                                                            <td>{{ $student->id }}</td>
                                                                            <td>{{ $student->name }}</td>

                                                                            <td id="checkbok">
                                                                                <input type="checkbox"
                                                                                    class="paid_finished_checkbox big-checkbox"
                                                                                    id="paid_finished_checkbox_{{ $student->id }}_{{ $group->id }}"
                                                                                    data-href="{{ route('admin.payment.store') }}"
                                                                                    data-student="{{ $student->id }}"
                                                                                    data-group="{{ $group->id }}"
                                                                                    data-amount="{{ $group->groupType->price }}"
                                                                                    {{ $student->checkPaid($group->id, $currentMonth) ? 'checked' : '' }}>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <select class="form-control basic month" name="month"
                                                            id="month" data-group="{{ $group->id }}"
                                                            data-href="{{ route('admin.payment.getPaymentsOfGroupByMonth') }}">
                                                            <option value="" selected="selected">
                                                                choose the month
                                                            </option>
                                                            <option value="January" selected="selected"
                                                                {{ $currentMonth ? 'selected' : '' }}>January
                                                            </option>
                                                            <option value="February" selected="selected"
                                                                {{ $currentMonth ? 'selected' : '' }}>February
                                                            </option>
                                                            <option value="March" selected="selected"
                                                                {{ $currentMonth ? 'selected' : '' }}>March
                                                            </option>
                                                            <option value="April" selected="selected"
                                                                {{ $currentMonth ? 'selected' : '' }}>April
                                                            </option>
                                                            <option value="May" selected="selected"
                                                                {{ $currentMonth ? 'selected' : '' }}>May
                                                            </option>
                                                            <option value="June" selected="selected"
                                                                {{ $currentMonth ? 'selected' : '' }}>June
                                                            </option>
                                                            <option value="July" selected="selected"
                                                                {{ $currentMonth ? 'selected' : '' }}>July
                                                            </option>
                                                            <option value="August" selected="selected"
                                                                {{ $currentMonth ? 'selected' : '' }}>August
                                                            </option>
                                                            <option value="September" selected="selected"
                                                                {{ $currentMonth ? 'selected' : '' }}>September
                                                            </option>
                                                            <option value="October" selected="selected"
                                                                {{ $currentMonth ? 'selected' : '' }}>October
                                                            </option>
                                                            <option value="November" selected="selected"
                                                                {{ $currentMonth ? 'selected' : '' }}>November
                                                            </option>
                                                            <option value="December" selected="selected"
                                                                {{ $currentMonth ? 'selected' : '' }}>December
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; right: 0px; height: 50px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 3px;"></div>
                                </div>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; right: 0px; height: 50px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 3px;"></div>
                                </div>
                            </div>

                            <div class="inv--thankYou" style="display: block;">
                                <div class="row">
                                    <div class="col-sm-12 col-12">
                                        <p class="">Thank you for doing Business with us.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com">DesignReset</a>,
                    All rights reserved.</p>
            </div>
            <div class="footer-section f-section-2">
                <p class="">Coded with
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-heart">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                        </path>
                    </svg>
                </p>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('adminAssets/assets/js/apps/invoice.js') }}"></script>
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <script src="{{ asset('js/payment.js') }}"></script>
@endpush
