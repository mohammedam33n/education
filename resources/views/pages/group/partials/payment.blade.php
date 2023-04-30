<div class="card component-card_4 col-sm-12">
    <div class="card-body ">
        <div class="table-responsive mb-4 mt-4 ">
            <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-12 mb-4">
                            <select class="form-control basic month" name="month" id="month"
                                data-group="{{ $group->id }}"
                                data-href="{{ route('admin.payment.getPaymentsOfGroupByMonth') }}"
                                data-href-payment-count="{{ route('admin.payment.getPaymentCountOfGroupByMonth') }}">
                                <option value="" selected="selected">
                                    {{ __('group.choose the month') }}
                                </option>
                                <option value="January" selected="selected" {{ $currentMonth ? 'selected' : '' }}>

                                    {{ __('group.January') }}
                                </option>
                                <option value="February" selected="selected" {{ $currentMonth ? 'selected' : '' }}>
                                    {{ __('group.February') }}
                                </option>
                                <option value="March" selected="selected" {{ $currentMonth ? 'selected' : '' }}>
                                    {{ __('group.March') }}
                                </option>
                                <option value="April" selected="selected" {{ $currentMonth ? 'selected' : '' }}>
                                    {{ __('group.April') }}
                                </option>
                                <option value="May" selected="selected" {{ $currentMonth ? 'selected' : '' }}>
                                    {{ __('group.May') }}
                                </option>
                                <option value="June" selected="selected" {{ $currentMonth ? 'selected' : '' }}>
                                    {{ __('group.June') }}
                                </option>
                                <option value="July" selected="selected" {{ $currentMonth ? 'selected' : '' }}>
                                    {{ __('group.July') }}
                                </option>
                                <option value="August" selected="selected" {{ $currentMonth ? 'selected' : '' }}>
                                    {{ __('group.August') }}
                                </option>
                                <option value="September" selected="selected" {{ $currentMonth ? 'selected' : '' }}>
                                    {{ __('group.September') }}
                                </option>
                                <option value="October" selected="selected" {{ $currentMonth ? 'selected' : '' }}>
                                    {{ __('group.October') }}
                                </option>
                                <option value="November" selected="selected" {{ $currentMonth ? 'selected' : '' }}>
                                    {{ __('group.November') }}
                                </option>
                                <option value="December" selected="selected" {{ $currentMonth ? 'selected' : '' }}>
                                    {{ __('group.December') }}
                                </option>
                            </select>
                        </div>
                        <table id="zero-config3" class="table table-hover dataTable">

                            <thead>

                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="multi-column-ordering"
                                        rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 82px;">
                                        {{ __('group.S.No') }}
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering"
                                        rowspan="1" colspan="1"
                                        aria-label="birthDay: activate to sort column ascending" style="width: 70px;">
                                        {{ __('group.Name') }}</th>
                                    <th class="sorting" tabindex="0" aria-controls="multi-column-ordering"
                                        rowspan="1" colspan="1"
                                        aria-label="paid: activate to sort column ascending" style="width: 70px;">
                                        {{ __('group.Paid') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($group->students as $student)
                                    <tr role="row">
                                        <td>{{ $student->id }}</td>
                                        <td class="sorting_1 sorting_2">
                                            <div class="d-flex">
                                                <div class="usr-img-frame mr-2 rounded-circle">
                                                    @if ($student->avatar)
                                                        <img alt="avatar" class="img-fluid rounded-circle"
                                                            src="{{ $student->avatar }}">
                                                    @else
                                                        <img src="{{ asset('images/Spare.jpg') }}"
                                                            class="img-fluid rounded-circle" class="avatar-image">
                                                    @endif
                                                </div>
                                                <a href="{{ route('admin.student.show', $student->id) }}">
                                                    <p class="align-self-center mb-0 admin-name text-primary">
                                                        {{ $student->name }} </p>
                                                </a>
                                            </div>
                                        </td>
                                        <td id="checkbok">
                                            <input type="checkbox"
                                                class="paid_finished_checkbox big-checkbox paid_finished_checkbox_by_show_payment"
                                                id="paid_finished_checkbox_{{ $student->id }}_{{ $group->id }}"
                                                data-href="{{ route('admin.payment.store') }}"
                                                data-student="{{ $student->id }}" data-group="{{ $group->id }}"
                                                data-amount="{{ $group->groupType->price }}"
                                                {{ $student->checkPaid($group->id, $currentMonth) ? 'checked' : '' }}>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1"> {{ __('group.S.No') }}</th>
                                    <th rowspan="1" colspan="1">{{ __('group.Name') }}</th>
                                    <th rowspan="1" colspan="1"> {{ __('group.Paid') }}</th>


                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
