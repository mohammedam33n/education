<div class="modal fade" id="creatGroupTypeModal" tabindex="-1" role="dialog" aria-labelledby="creatGroupTypeModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 mb-2 bg-primary">
                <h5 class="modal-title text-white" id="creatGroupTypeModal">{{ __('group.Create Group Type') }}</h5>
            </div>
            <div class="modal-body px-6">
                <form action="{{ route('admin.group_types.store') }}" method="post">
                    @csrf


                    <x-text name="name" label="{{ __('group.name') }}" :value="old('name')" />

                    <x-text name="days_num" label="{{ __('group.days_num') }}" :value="old('days_num')" />

                    <x-text name="price" label="{{ __('group.price') }}" :value="old('price')" />

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
