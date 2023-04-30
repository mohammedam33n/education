$(document).on('click', '.editRoleButton', function (e) {
    e.preventDefault();
    $('#editRoleModal').modal('show');
    let role = $(this).data('role')
    let href = $(this).data('href')
    $('#editRoleForm #name').val(role.name)
    $('#editRoleForm #display_name').val(role.display_name)
    $('#editRoleForm #description').val(role.description)

    $('#editRoleForm').attr('action', href)

})