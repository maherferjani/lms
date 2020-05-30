<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
  public function run()
  {
    $roles = Role::all();
    $role_formateur  = Role::where('name', 'formateur')->first();
    $role_user  = Role::where('name', 'user')->first();

    $admin = new User();
    $admin->name = 'admin';
    $admin->email = 'admin@gmail.com';
    $admin->password = bcrypt('admin123');
    $admin->save();
    $admin->roles()->attach($roles);

    $formateur = new User();
    $formateur->name = 'Formateur';
    $formateur->email = 'formateur@gmail.com';
    $formateur->password = bcrypt('formateur123');
    $formateur->save();
    $formateur->roles()->attach($role_formateur);
    $formateur->roles()->attach($role_user);

    $user = new User();
    $user->name = 'user';
    $user->email = 'maher@gmail.com';
    $user->password = bcrypt('user123');
    $user->save();
    $user->roles()->attach($role_user);
  }
}
