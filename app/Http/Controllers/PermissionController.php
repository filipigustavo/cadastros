<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\User;

class PermissionController extends Controller
{
  /**
  * Create all te roles and permissions.
  * Assign permissions to roles and roles to users.
  */
  public function createAll(){
    die('nope');exit;

    // Roles...
    $owner = new Role();
    $owner->name = 'owner';
    $owner->display_name = 'Project Owner';
    $owner->description = 'Dono de tudo';
    $owner->save();

    $admin = new Role();
    $admin->name = 'admin';
    $admin->display_name = 'Administrator';
    $admin->description = 'Controle total';
    $admin->save();

    $editor = new Role();
    $editor->name = 'editor';
    $editor->display_name = 'Editor';
    $editor->description = 'Editor dos ítens';
    $editor->save();

    $reader = new Role();
    $reader->name = 'reader';
    $reader->display_name = 'Reader';
    $reader->description = 'Leitor dos ítens';
    $reader->save();



    // Permissions...
    $editUser = new Permission();
    $editUser->name = 'edit-user';
    $editUser->display_name = 'Editar usuário';
    $editUser->description = 'Pode editar os dados dos usuários';
    $editUser->save();

    $createCategoria = new Permission();
    $createCategoria->name = 'create-categoria';
    $createCategoria->display_name = 'Criar categoria';
    $createCategoria->description = 'Pode criar categoria';
    $createCategoria->save();

    $deleteCategoria = new Permission();
    $deleteCategoria->name = 'delete-categoria';
    $deleteCategoria->display_name = 'Apagar categoria';
    $deleteCategoria->description = 'Pode apagar categoria';
    $deleteCategoria->save();

    $editCategoria = new Permission();
    $editCategoria->name = 'edit-categoria';
    $editCategoria->display_name = 'Editar categoria';
    $editCategoria->description = 'Pode editar categoria';
    $editCategoria->save();

    $readCategoria = new Permission();
    $readCategoria->name = 'read-categoria';
    $readCategoria->display_name = 'Visualizar categoria';
    $readCategoria->description = 'Pode visualizar categoria';
    $readCategoria->save();



    // Assign permissions to roles...
    $owner->attachPermission($editUser);

    $admin->attachPermissions([
      $createCategoria,
      $deleteCategoria,
      $editCategoria,
      $readCategoria
    ]);

    $editor->attachPermissions([
      $createCategoria,
      $editCategoria,
      $readCategoria
    ]);

    $reader->attachPermission($readCategoria);



    // Assign roles to users
    $userAdmin = User::find(1);
    $userAdmin->attachRole($admin);

    $userEditor = User::find(2);
    $userEditor->attachRole($editor);

    $userReader = User::find(3);
    $userReader->attachRole($reader);

    return 'Roles & permissions gerados com sucesso!';
  }
}
