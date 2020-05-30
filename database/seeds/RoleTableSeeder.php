<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
  public function run()
  {
    $role_admin = new Role();
    $role_admin->name = 'admin';
    $role_admin->description = 'Admininistrateur';
    $role_admin->save();

    $role_manager_event = new Role();
    $role_manager_event->name = 'formateur';
    $role_manager_event->description = 'Formateur';
    $role_manager_event->save();


    $role_user = new Role();
    $role_user->name = 'user';
    $role_user->description = 'Apprenant';
    $role_user->save();
  }
}
