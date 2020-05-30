<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UtilisateurController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(){
      $you = auth()->user();
      $users = User::all();
      $admins = User::whereHas('roles', function($q){
        $q->whereIn('name', ['admin']);
      })->get();
      $formateurs = User::whereHas('roles', function($q){
        $q->whereIn('name', ['formateur']);
      })->get();
      return view('admin.users.index',compact('users', 'admins', 'formateurs', 'you'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $user = User::find($id);
      return view('admin.users.show', compact( 'user' ));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      $user = User::find($id);
      $you = auth()->user();
      return view('admin.users.edit', compact('user','you'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      $validatedData = $request->validate([
          'name'       => 'required|min:1|max:256',
          'email'      => 'required|email|max:256'
      ]);
      $user = User::find($id);
      $user->name       = $request->input('name');
      $user->email      = $request->input('email');
      $user->save();
      switch ($request->input('role')) {
        case 'formateur':
          $user->roles()->detach(Role::all());
          $user->roles()->attach(Role::where('name', 'user')->first());
          $user->roles()->attach(Role::where('name', 'formateur')->first());
          break;
        case 'admin':
            $user->roles()->detach(Role::all());
            $user->roles()->attach(Role::where('name', 'admin')->first());
            $user->roles()->attach(Role::where('name', 'formateur')->first());
            $user->roles()->attach(Role::where('name', 'user')->first());
            break;
        case 'user':
          $user->roles()->detach(Role::all());
          $user->roles()->attach(Role::where('name', 'user')->first());
          break;
        default:
          break;
      }
      $request->session()->flash('message', 'Successfully updated user');
    return redirect()->route('users.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      $user = User::find($id);
      if($user){
          $user->delete();
      }
      return redirect()->route('users.index');
  }
  public function store(Request $request)
  {
    $validatedData = $request->validate([
        'name'       => 'required|min:1|max:256',
        'email'      => 'required|email|max:256',
        'password' => 'required|string|min:8|confirmed'
    ]);
    $user = User::create([
      'name' => $request->input('name'),
      'email' => $request->input('email'),
      'password' => Hash::make($request->input('password')),
    ]);
    $user->roles()->attach(Role::where('name', 'user')->first());
    $user->roles()->attach(Role::where('name', 'formateur')->first());
    return redirect()->route('users.index');
  }
  public function create()
  {
      return view('admin.users.create');
  }
}
