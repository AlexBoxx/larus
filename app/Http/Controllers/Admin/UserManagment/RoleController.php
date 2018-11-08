<?php

namespace App\Http\Controllers\Admin\UserManagment;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['title'] = 'Роли пользователей';
      $data['roles'] = Role::with('children')->where('parent_id', '0')->paginate(10);
      $data['delimiter'] = '';


        return view('admin.user_managment.role.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['title'] = 'Добавить Роль';
      $data['role'] = [];
      $data['roles'] = Role::with('children')->where('parent_id', '0')->get();
      $data['delimiter'] = '';

        //dd($data['roles']);

      return view('admin.user_managment.role.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validator = $request->validate([
          'title' => 'required|string|max:255|min:3',
          'alias' => 'required|string|max:255|min:3|unique:roles',
      ]);

      Role::create([
        'title' => $request['title'],
        'alias' => $request['alias'],
        'parent_id' => $request['parent_id'],
      ]);

      return redirect()->route('admin.user_managment.role.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
      $data['title'] = 'Редактировать Роль';
      $data['role'] = $role;
      $data['roles'] = Role::with('children')->where('parent_id', '0')->get();
      $data['delimiter'] = '';

      //dd($data['role']);
      return view('admin.user_managment.role.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {

      $validator = $request->validate([
          'title' => 'required|string|max:255|min:3',
          'alias' => 'string|max:255|min:3',
      ]);

      $role->update($request->except('alias'));

      return redirect()->route('admin.user_managment.role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
      $role->delete();

      return redirect()->route('admin.user_managment.role.index');
    }
}
