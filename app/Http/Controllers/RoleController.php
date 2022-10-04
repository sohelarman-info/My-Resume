<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    function Role(){
        return view('admin.roles.role-manager',[
            'users'         => User::all(),
            'roles'         => Role::all(),
            'permissions'   => Permission::all(),
        ]);


        // $role = Role::create(['name' => 'Admin']);
        // $permission = Permission::create(['name' => 'Edit Articles']);
    }
    function RolesAdd(Request $req){
        // $req->validate([
        //     'role_name' => ['required', 'min:3', 'unique:roles']
        // ],[
        //     'name.required' => 'Role name is required',
        //     'name.min' => 'It should contain minimum 3 characters',
        //     'name.unique' => 'Your file already exists',
        // ]);

        Role::create([
            'name'          => $req->role_name,
            'created_at'    => Carbon::now(),
        ]);

        return back()->with('success', 'Role Added Successfully !');
    }
    function Permissions(){
        return view('admin.roles.role-permissions',[
            'users'         =>User::all(),
            'roles'         => Role::all(),
            'permissions'   => Permission::all(),
        ]);
    }
    function PermissionAdd(){
        return view('admin.roles.permission-add',[
            'users'         =>User::all(),
            'roles'         => Role::all(),
            'permissions'   => Permission::all(),
        ]);
    }
    function PermissionAddPost(Request $request){
        // $request->validate([
        //     'permission_name' => ['required', 'min:3', 'unique:name']
        // ],[
        //     'name.required' => 'Permission name is required',
        //     'name.min' => 'It should contain minimum 3 characters',
        //     'name.unique' => 'Your file already exists',
        // ]);

        Permission::create([
            'name'          => $request->permission_name,
            'created_at'    => Carbon::now(),
        ]);

        return back()->with('PermissionAdd', 'Permission Added Successfully !');
    }

    function RoleAddToPermission(Request $request){
        $role_name = $request->role_name;
        $permission_name = $request->permission_name;
        $role = Role::where('name', $role_name)->first();
        // $role->syncPermissions($permission_name); Only 01 permission add
        $role->givePermissionTo($permission_name); //Multiple Permission add
        return back()->with('RoleAddToPermission', 'Permission Added To Role Successfully !');
    }
    function UserRole(){
        return view('admin.roles.user-role',[
            'users'         => User::all(),
            'roles'         => Role::all(),
            'permissions'   => Permission::all(),
        ]);
    }
    function UserPermissions($user_id){
        $user = User::findOrFail($user_id);
        return view('admin.roles.user-permissions',[
            'permissions'   => Permission::all(),
            'user'         => $user,
        ]);
    }
    function AddRoleToUser(Request $request){
        $user_id = $request->user_id;
        $user_role = $request->user_role;
        $user = User::findOrFail($user_id);
        // $user->assignRole($user_role); Multiple Role Add to user
        $user->syncRoles($user_role); //Single Role add to user
        return back()->with('AddRoleToUser', 'Role Added To User Successfully !');
    }
    function UpdateUserPermissions(Request $request){
        $user = User::findOrFail($request->user_id);
        $user->syncPermissions($request->permission);
        return redirect()->route('UserRole')->with('AddRoleToUser', 'User Permission Updated');
    }
    function PermissionEdit($id){
        return view('admin.roles.permission-edit',[
            'permissions' => Permission::findOrFail($id),
        ]);
    }
    function PermissionUpdate(Request $request){
        $request->validate([
            'name' => ['required', 'min:3', 'max:20', 'unique:permissions']
        ]);
        $permission = Permission::findOrFail($request->id);
        $permission->name = $request->name;
        $permission->save();
        return redirect()->route('PermissionAdd')->with('PermissionAdd','Permission updated successfully done');
    }
    function PermissionDelete($id){
        Permission::findOrFail($id)->delete();
        return back()->with('PermissionAdd', 'Permission deleted successfully done !');
    }
    function RoleEdit($id){
        return view('admin.roles.role-edit',[
            'role' => Role::findOrFail($id),
        ]);
    }
    function RoleUpdate(Request $request){
        $role = Role::findOrFail($request->id);
        $role->name = $request->name;
        $role->save();
        return redirect()->route('Role')->with('success', 'Role Updated Successfully !');
    }
    function RoleDelete($id){
        Role::findOrFail($id)->delete();
        return back()->with('success', 'Role deleted successfully done !');

    }
}
