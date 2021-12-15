<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Requests\Panel\User\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {

        return view('panel.user.profile');
    }

    public function update(UpdateUserRequest $request)
    {
        $data = $request->validated();
        if ($request->get('password')) {
            $data['password'] = Hash::make($request->get('password'));
        } else {
            unset($data['password']);
        }

        auth()->user()->update($data);

        session()->flash('status', 'اطلاعات کاربر با موفقیت بروزرسانی شد');
        return back();
    }
}