<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with('roles');

        // Search by name or email with case-insensitive matching
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereRaw('LOWER(name) LIKE ?', [strtolower("%{$search}%")])
                  ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        // Filter by role
        if ($request->has('role') && $request->role != '') {
            $query->whereHas('roles', function ($q) use ($request) {
                $q->where('name', $request->role);
            });
        }

        $users = $query->get();

        // Ensure admin role for user ID 1
        $user = User::find(1);
        if ($user) {
            $adminRole = Role::firstOrCreate(['name' => 'admin']);
            if (!$user->roles()->where('role_id', $adminRole->id)->exists()) {
                $user->roles()->attach($adminRole->id);
            }
        }

        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::with('roles')->findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        $role = Role::where('name', $validated['role'])->first();
        if ($role) {
            $user->roles()->sync([$role->id]);
        }

        return redirect()->route('users.index')->with('success', 'تم إنشاء المستخدم وتخصيص الدور بنجاح.');
    }

    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'role' => 'required|exists:roles,name',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? bcrypt($validated['password']) : $user->password,
        ]);

        $role = Role::where('name', $validated['role'])->first();
        if ($role) {
            $user->roles()->sync([$role->id]);
        }

        return redirect()->route('users.index')->with('success', 'تم تحديث المستخدم وتغيير الدور بنجاح.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->roles->contains('name', 'admin')) {
            return redirect()->route('users.index')->with('error', 'لا يمكن حذف مستخدم بصلاحيات الإدارة.');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success', 'تم حذف المستخدم بنجاح.');
    }

    public function assignRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($request->user_id);
        $role = Role::findOrFail($request->role_id);

        if ($role) {
            $user->assignRole($role->name);
            return back()->with('success', "تم إسناد الدور {$role->name} للمستخدم {$user->name} بنجاح.");
        }

        return back()->with('error', 'حدث خطأ أثناء إسناد الدور.');
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role->name)) {
            $user->removeRole($role->name);
            return back()->with('success', "تم إزالة الدور {$role->name} من المستخدم {$user->name} بنجاح.");
        }

        return back()->with('error', 'لا يمكن إزالة دور غير موجود.');
    }

    public function assignRoleToUser($userId, $roleName)
    {
        $user = User::findOrFail($userId);
        $user->assignRole($roleName);
        return redirect()->back()->with('success', 'تم إسناد الدور بنجاح.');
    }

    public function assignPermissionToUser($userId, $permissionName)
    {
        $user = User::findOrFail($userId);
        $user->givePermissionTo($permissionName);
        return redirect()->back()->with('success', 'تم إسناد الصلاحية بنجاح.');
    }

    public function removeRoleFromUser($userId, $roleName)
    {
        $user = User::findOrFail($userId);
        $user->removeRole($roleName);
        return redirect()->back()->with('success', 'تم إزالة الدور بنجاح.');
    }

    public function removePermissionFromUser($userId, $permissionName)
    {
        $user = User::findOrFail($userId);
        $user->revokePermissionTo($permissionName);
        return redirect()->back()->with('success', 'تم إزالة الصلاحية بنجاح.');
    }
}