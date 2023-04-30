<?php

namespace App\Http\Controllers;

use App\DataTables\RoleDataTable;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;
use App\Jobs\AttachPermissionsToRoleJob;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    public function __construct()
    {

    }

    public function index(RoleDataTable $roleDataTable)
    {
        return $roleDataTable->render('pages.role.index');
    }

    public function create()
    {
        return view('pages.role.create');
    }

    public function store(StoreRoleRequest $request): RedirectResponse
    {
        $role = Role::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description
        ]);

        $allPermissionsNames = [];
        foreach($request->permissions as $table => $permissions)
        {
            foreach($permissions as $permission)
            {
                $allPermissionsNames []= $permission;
            }
        }

        AttachPermissionsToRoleJob::dispatch($allPermissionsNames, $role);

        // $allPermissions = Permission::whereIn('name',$allPermissionsNames)->get();

        // $role->attachPermissions($allPermissions);

        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.role.index'));
    }

    public function edit(Role $role): Factory|View|Application
    {
        return view('pages.role.edit', compact('role'));
    }

    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        $role->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'description' => $request->description
        ]);
        Alert::toast('تمت العملية بنجاح', 'success');
        return redirect(route('admin.role.index'));
    }

    public function delete(Role $role): RedirectResponse
    {
        $role->delete();
        Alert::toast('تمت العملية بنجاح', 'success');
        return back();
    }
}
