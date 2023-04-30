@extends('master')


@push('css')
    @if (LaravelLocalization::getCurrentLocale() == 'ar')
        {{--BreadCrumb--}}
        <link href="{{asset('adminRtl/assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css">
        {{--Tabs--}}
        <link href="{{asset('adminRtl/assets/css/components/tabs-accordian/custom-tabs.css')}}" rel="stylesheet"
              type="text/css">
    @else
        {{--BreadCrumb--}}
        <link href="{{asset('adminAssets/assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css">
        {{--Tabs--}}
        <link href="{{asset('adminAssets/assets/css/components/tabs-accordian/custom-tabs.css')}}" rel="stylesheet"
              type="text/css">
    @endif
@endpush

@section('breadcrumb')
    <div class="row my-3 ">
        <div class="col-md-12">
            <div class="breadcrumb bg-transparent">

                <div class="breadcrumb-four">
                    <ul class="breadcrumb">
                        <li>
                            <a href="{{route('admin.role.index')}}"
                               class="d-flex justify-content-center align-items-center">
                                <i class="fa-solid fa-house mx-2 fa-2x"></i>
                                <span class="font-weight-bold mt-1">{{__('globalWorld.home')}}</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{route('admin.role.edit' ,$role->id)}}"
                               class="d-flex justify-content-center align-items-center">

                                <i class="fa-solid fa-pen-to-square fa-2x mx-2"></i>
                                <span class="font-weight-bold mx-1">{{__('globalWorld.update')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="font-weight-bold text-capitalize">{{__('roles.update')}}</h3>
                    </div>
                    <div class="card-body">

                        <ul class="nav nav-tabs  mb-3" id="animateLine" role="tablist">

                            <li class="nav-item">
                                <a class="nav-link active"
                                   id="animated-underline-home-tab"
                                   data-toggle="tab"
                                   href="#animated-underline-home"
                                   role="tab"
                                   aria-controls="animated-underline-home"
                                   aria-selected="true">
                                    <i class="fa-solid fa-user-gear fa-2x"></i>

                                    <span class="font-weight-bold">{{__('roles.info')}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"
                                   id="animated-underline-profile-tab"
                                   data-toggle="tab"
                                   href="#animated-underline-profile"
                                   role="tab"
                                   aria-controls="animated-underline-profile"
                                   aria-selected="false">

                                    <i class="fa-solid fa-gears fa-2x"></i>

                                    <span class="font-weight-bold">{{__('roles.permissions')}}</span>

                                </a>
                            </li>

                        </ul>

                        <div class="tab-content " id="animateLineContent-4">
                            <div class="tab-pane fade show active" id="animated-underline-home" role="tabpanel"
                                 aria-labelledby="animated-underline-home-tab">
                                <form action="{{ route('admin.role.update' ,$role->id) }}" method="post">
                                    <div class="modal-body  my-5 rounded border border-solid b-1 bg-light">
                                        @csrf
                                        @method('put')

                                        @include('pages.role.partials.form')

                                    </div>

                                    <div class="modal-footer">
                                        <button type="button"
                                                class="btn btn-danger font-weight-bold text-white"
                                                data-dismiss="modal">{{__('globalWorld.Close')}}
                                        </button>

                                        <button type="submit"
                                                class="btn btn-success font-weight-bold text-white">{{__('globalWorld.update')}}
                                        </button>

                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="animated-underline-profile" role="tabpanel"
                                 aria-labelledby="animated-underline-profile-tab">
                                <div class="media">

                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="card-footer">
                        <h4>Test</h4>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection

@push('js') @endpush

