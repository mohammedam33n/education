<div class="modal fade" id="creatUserModal" tabindex="-1" role="dialog" aria-labelledby="creatUserModal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="creatUserModalTitle">إضافة درس</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.user.store') }}" method="post">
                    @csrf

                    <x-text name="name" label="Name" :value="old('name')" />

                    <x-text name="email" label="Email" :value="old('email')" />

                    <x-text name="password" label="Password" :value="old('password')" />

                    <x-text name="password_confirmation" label="Confirm Password" />

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>Discard</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>
