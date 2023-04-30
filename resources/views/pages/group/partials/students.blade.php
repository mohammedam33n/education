<div class="card component-card_4 col-sm-12">
    <div class="card-body">
        <div class="table-responsive mb-4 mt-4">
            <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        @if (!$group->checkIfGroupExceededGroupDaysLimit())
                            <div class="col-xl-2 col-md-2 col-sm-2 col-2 float-right">
                                <a data-toggle='modal' data-target='#creatGroupStudentModal' class="btn btn-primary"
                                    data-href="{{ route('admin.group_students.getGroupStudents') }}"
                                    id="creatGroupStudentModalInGroupShow"
                                    data-group_id="{{ $group->id }}">{{ __('group.Create Group Student') }}</a>
                            </div>
                        @endif
                        <table id="zero-config2" class="table table-hover dataTable">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="multi-column-ordering"
                                        rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 82px;">
                                        {{ __('group.name') }}
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering"
                                        rowspan="1" colspan="1"
                                        aria-label="Position: activate to sort column ascending" style="width: 70px;">
                                        {{ __('group.Birthday') }}</th>
                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering"
                                        rowspan="1" colspan="1"
                                        aria-label="Office: activate to sort column ascending" style="width: 49px;">
                                        {{ __('group.Phone') }}
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering"
                                        rowspan="1" colspan="1"
                                        aria-label="Age: activate to sort column ascending" style="width: 27px;">
                                        {{ __('globalWorld.Delete') }}
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($group->groupStudents as $groupStudent)
                                    <tr role="row">
                                        <td class="sorting_1 sorting_2">
                                            <div class="d-flex">
                                                <div class="usr-img-frame mr-2 rounded-circle">
                                                    @if ($groupStudent->student->avatar)
                                                        <img alt="avatar" class="img-fluid rounded-circle"
                                                            src="{{ $groupStudent->student->avatar }}">
                                                    @else
                                                        <img src="{{ asset('images/Spare.jpg') }}"
                                                            class="img-fluid rounded-circle" class="avatar-image">
                                                    @endif
                                                </div>
                                                <a href="{{ route('admin.student.show', $groupStudent->student->id) }}">
                                                    <p class="align-self-center mb-0 admin-name text-primary">
                                                        {{ $groupStudent->student->name }}</p>
                                                </a>
                                            </div>
                                        </td>
                                        <td>{{ $groupStudent->student->birthday }}</td>
                                        <td>{{ $groupStudent->student->phone }}</td>
                                        <td>
                                            <div>
                                                <x-delete-link :route="route('admin.group_students.delete', $groupStudent->id)" />
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1"> {{ __('group.name') }}</th>
                                    <th rowspan="1" colspan="1">{{ __('group.Birthday') }}</th>
                                    <th rowspan="1" colspan="1"> {{ __('group.Phone') }}</th>
                                    <th rowspan="1" colspan="1"> {{ __('globalWorld.Delete') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
