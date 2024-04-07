<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6'
        ]);

        $student = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $student->assignRole('学生');

        return back()->with('success', '学生添加成功');
    }

    public function destroy(User $student)
    {
        $student->delete();
        return back()->with('success', '学生删除成功');
    }

    public function manageStudents()
    {
        // 获取所有学生信息
        $studentsRole = Role::findByName('学生', 'web'); // 获取学生角色
        $students = $studentsRole->users()->get(); // 获取拥有学生角色的所有用户
        return view('admin.students', compact('students'));

    }
}
