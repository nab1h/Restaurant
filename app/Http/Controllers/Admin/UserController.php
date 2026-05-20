<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'new_password' => 'required|min:6|string',
        ]);

        $user = User::findOrFail($id);
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('status', 'تم تحديث كلمة مرور المستخدم بنجاح');
    }

    public function destroy($id)
    {
        if ($id == 1) {
            return redirect()->back()->with('error', 'لا يمكن حذف حساب المدير الرئيسي');
        }

        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with('status', 'تم حذف المستخدم بنجاح');
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:admin,sales,user',
        ]);

        $user = User::findOrFail($id);

        if (Auth::check() && Auth::id() == $user->id && $request->role !== 'admin') {
            return redirect()->back()->with('error', 'لا يمكنك تغيير صلاحياتك الخاصة!');
        }

        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('status', 'تم تغيير صلاحية المستخدم بنجاح');
    }
}
