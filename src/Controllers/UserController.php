<?php

namespace App\Controllers;

use App\Models\User;
use Config\Controller;
use App\Requests\UserRequests;
/*
|-----------------------------------------------------
| Sample Controller Resource
|-----------------------------------------------------
|
| Here is where you can controll the routes for /users 
|
*/
class UserController extends Controller{
    public function index(){
        $users = User::findAll();
        $this->render('users/index', ['users' => $users ]);
    }
    public function create(){
        $this->render('users/create');
    }
    public function store(){
        $name = $password = $email = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create_user'])) {
            $name = isset($_POST['name']) ? $_POST['name'] : null;
            $password = isset($_POST['password']) ? $_POST['password'] : null;
            $email = isset($_POST['email']) ? $_POST['email'] : null;
        }
        if(empty($name)){
            return "Username must not be empty";
        }
        if(empty($email)){
            return "Email must not be empty";
        }
        if(empty($password)){
            return "Password must not be empty";
        }
        $user = [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];
        return User::insert($user);
        // $this->render('users/index');
    }
    public function show($id){
        $user = User::find($id);
        $this->render('users/show', ['user' => $user]);
    }
    public function edit($id){
        $user = User::find($id);
        $this->render('users/edit', ['user' => $user]);
    }
    public function update($id){
        $name = $email = '';
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_user'])) {
            $name = isset($_POST['name']) ? $_POST['name'] : null;
            $email = isset($_POST['email']) ? $_POST['email'] : null;
        }
        if(empty($name)){
            return "Username must not be empty";
        }
        if(empty($email)){
            return "Email must not be empty";
        }
        $data = [
            'name' => $name,
            'email' => $email,
        ];
        return User::update($id, $data);
        // var_dump($user);
        // die();
        // $this->render('welcome');
    }
    public function destroy($id){
        return User::delete($id);
    }
    
}