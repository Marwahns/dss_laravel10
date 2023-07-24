<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $data['pageTitle'] = 'VIKOR | Profile'; // Judul halaman
        $data['breadcrumb'] = 'Profile'; // breadcrumb
        $data['user'] = User::find(Auth::user()->id);
        $data['roles'] = Role::pluck('name', 'name')->all();
        $data['userRole'] = $data['user']->roles->pluck('name', 'name')->all();
        return view('profile.index', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required'
        ]);

        $input = $request->all();

        if (!empty($input['change_password']) && $input['change_password'] == 'on') {
            $this->validate($request, [
                'password' => [
                    'required',
                    'same:confirm-password',
                    'min:8',           // Minimum length of 8 characters
                    // 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
                ]
            ], [
                'password.required' => 'The password field is required.',
                'password.min' => 'The password must be at least :min characters.',
                // 'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character from @$!%*?&.',
            ]);
        }

        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('profile.index')
            ->with('success', 'User updated successfully');
    }
}
