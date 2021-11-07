<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\User\CreateUser;
use App\Http\Requests\Panel\User\UpdateUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function index()
    {
        $users = User::paginate(3);
        return view('panel.user', compact('users'));
    }


    public function create()
    {
        return view('panel.create');
    }


    public function store(CreateUser $request)
    {
        $mobile = $request->get('mobile');
//        $data = $request->only(['name', 'email', 'mobile', 'role']);
        $data = $request->validated();
        $data['password'] = Hash::make($mobile);
        User::create($data);
        $request->session()->flash('status', 'کاربر با موفقیت ساخته شد!');
        return redirect()->route('users.index');
    }


    public function edit(User $user)
    {
//        $user = User::findOrFail($id);
        return view('panel.edit', compact('user'));
    }


    public function update(UpdateUser $request, User $user)
    {

        $user->update(
//            $request->only(['name', 'email', 'mobile', 'role'])
            $request->validated()
        );
        $request->session()->flash('status', 'اطلاعات به درستی به روزرسانی شدند!');

        return redirect()->route('users.index');
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();
        $request->session()->flash('status', 'کاربر با موفقیت حذف شد!');
        return back();
    }
}
