<?php

namespace App\Http\Controllers\Admin\UserManagment;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['title'] = 'Пользователи';
      $data['users'] = User::paginate(10);

        return view('admin.user_managment.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Добавить Пользователя';
        $data['user'] = [];
        return view('admin.user_managment.user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data['title'] = 'Добавить Пользователя';

      $validator = $request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:6|confirmed',
      ]);

      User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => bcrypt($request['password'])
      ]);

      return redirect()->route('admin.user_managment.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
      $data['title'] = 'Редактировать Пользователи';
      $data['user'] = $user;
        return view('admin.user_managment.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

      $validator = $request->validate([
          'name' => 'required|string|max:255',
          'email' => [
            'required',
            'string',
            'email',
            'max:255',
            \Illuminate\Validation\Rule::unique('users')->ignore($user->id),
          ],
          'password' => 'nullable|string|min:6|confirmed',
      ]);

      $user->name = $request['name'];
      $user->email = $request['email'];
      $request['password'] == null ?: $user->password = bcrypt($request['password']);
      $user->save();


      return redirect()->route('admin.user_managment.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

      return redirect()->route('admin.user_managment.user.index');
    }
}
