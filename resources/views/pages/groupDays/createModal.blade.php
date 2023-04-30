<div class="modal fade" id="creatGroupDayModal" tabindex="-1" role="dialog" aria-labelledby="creatGroupDayModal"
    aria-hidden="true" data-toggle="modal" data-href="{{ route('admin.group_day.getGroupDaysOfGroup') }}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 mb-2 bg-primary">
                <h5 class="modal-title text-white" id="creatGroupDayModal">
                    {{ __('group.Create Group Days') }}
                </h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.group_day.store') }}" method="post">
                    @csrf
                    @if (!isset($group))
                        <div class="form-group row mb-4">
                            <label for="age_type" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">
                                {{ __('group.Choose group') }}
                            </label>
                            <div class="col-xl-10 col-lg-9 col-sm-10">
                                <select class="form-control basic chickgroup" style="width: 100%;" name="group_id"
                                    id="group_id" data-href="{{ route('admin.group_day.getGroupDaysOfGroup') }}">
                                    <option value=""> {{ __('group.Choose group') }}</option>
                                    @foreach ($groups as $group)
                                        @if (!$group->checkIfGroupExceededGroupDaysLimit())
                                            <option value="{{ $group->id }}"
                                                {{ old('group_id') == $group->id ? 'selected' : '' }}>
                                                {{ $group->ffrom }} :
                                                {{ $group->fto }} -
                                                {{ $group->groupType->days_num }} Namber Days :
                                                Remainging
                                                {{ $group->getRemainingGroupDaysCount() }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('group_id')
                                    <p class="text-danger" data-href="{{ route('admin.group_day.getGroupDaysOfGroup') }}">
                                        {{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    @else
                        <input type="hidden" name="group_id" id="group_id" value="{{ $group->id }}"
                            data-groupid="{{ $group->id }}">
                    @endif

                    <div class="form-group row mb-4">
                        <label for="day" class="col-xl-2 col-sm-3 col-sm-2 col-form-label text-primary">
                            {{ __('group.day') }}</label>
                        <div class="col-xl-10 col-lg-9 col-sm-10">
                            <select class="form-control" style="width: 100%;" name="day" id="day">
                                <option value="Monday"{{ old('day') == 'Monday' ? 'selected' : '' }}>
                                    {{ __('group.Monday') }}
                                </option>

                                <option value="Tuesday" {{ old('day') == 'Tuesday' ? 'selected' : '' }}>
                                    {{ __('group.Tuesday') }}
                                </option>

                                <option value="Wednesday" {{ old('day') == 'Wednesday' ? 'selected' : '' }}>
                                    {{ __('group.Wednesday') }}
                                </option>

                                <option value="Thursday" {{ old('day') == 'Thursday' ? 'selected' : '' }}>
                                    {{ __('group.Thursday') }}
                                </option>

                                <option value="Friday" {{ old('day') == 'Friday' ? 'selected' : '' }}>
                                    {{ __('group.Friday') }}
                                </option>

                                <option value="Saturday" {{ old('day') == 'Saturday' ? 'selected' : '' }}>
                                    {{ __('group.Saturday') }}
                                </option>

                                <option value="Sunday" {{ old('day') == 'Sunday' ? 'selected' : '' }}>
                                    {{ __('group.Sunday') }}
                                </option>

                            </select>
                            @error('day')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"> {{ __('globalWorld.Save') }}</button>
                        <button class="btn" data-dismiss="modal"><i
                                class="flaticon-cancel-12"></i>{{ __('globalWorld.Discard') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
