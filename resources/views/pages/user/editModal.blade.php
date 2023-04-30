<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="editUser" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserTitle">تعديل الدرس</h5>
            </div>
            <div class="modal-body">
                <form id="editUserForm" method="post">
                    @csrf
                    @method('PUT')

                    <x-text name="name" label="Name" />

                    <x-text name="email" label="Email" />

                    <x-text name="password" label="Password" />

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
