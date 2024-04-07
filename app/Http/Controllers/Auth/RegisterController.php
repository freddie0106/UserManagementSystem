<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /**
     * 显示注册表单。
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $roles = Role::all(); // 获取所有角色
        return view('auth.register', compact('roles'));
    }

    /**
     * 处理注册请求。
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());
        $user->assignRole($request->role); // 分配角色

        auth()->login($user);

        return redirect('/')->with('success', '注册成功！');
    }

    /**
     * 获取用户注册数据的验证规则。
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => ['required', 'exists:roles,name']
        ], [
            'name.required' => '姓名不能为空',
            'email.required' => '邮箱不能为空',
            'password.required' => '密码不能为空',
            'password.min' => '密码至少需要6位',
            'password.confirmed' => '确认密码不匹配',
            'role.required' => '必须选择一个角色'
        ]);
    }

    /**
     * 创建新的用户实例。
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole($data['role']);

        return $user;
    }
}
