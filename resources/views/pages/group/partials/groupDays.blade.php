<div class="card component-card_4 col-sm-12">
    <div class="card-body">
        <div class="user-profile">
            <img src="{{ asset('adminAssets/assets/img/mother.png') }}" class="" alt="..." style="width: 200px">
        </div>
        <div class="table-responsive mb-4 mt-4">
            <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        @if (!$group->checkIfGroupExceededGroupDaysLimit())
                            <div class="col-xl-2 col-md-2 col-sm-2 col-2 float-right">
                                <a data-toggle='modal' data-target='#creatGroupDayModal'
                                    class="btn btn-primary ">{{ __('group.Create Group Days') }}</a>
                            </div>
                        @endif
                        <table id="zero-config" class="table table-hover dataTable">
                            <thead>
                                <tr role="row">
                                    <th class="text-center">{{ __('group.Group Days') }}</th>
                                    <th class="text-center">{{ __('globalWorld.Delete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($group->groupDays as $groupDay)
                                    <tr role="row">
                                        <td class="text-center text-dark">{{ $groupDay->day }}</td>
                                        <td class="text-center">
                                            <div class="text-center">
                                                <x-delete-link :route="route('admin.group_day.delete', $groupDay->id)" />
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
