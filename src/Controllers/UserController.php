<?php

namespace App\Controllers;

use App\Models\Users;
use Core\Controller;
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
        $users = Users::findAll();
        $this->render('users/index', ['users' => $users ]);
    }
    public function create(){
        $this->render('users/create');
    }
    public function store(){
        try {
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
            return Users::insert($user);
        } catch (\Throwable $th) {
            echo $th;
        }
        // $this->render('users/index');
    }
    public function show($id){
        try {
            $user = Users::find($id);
            if ($user) {
                # code...
                return $this->render('users/show', ['user' => $user]);
            }
            throw new \Throwable;
        } catch (\Throwable $th) {
            (new Controller())->abort(404);
        }
    }
    public function edit($id){
        try {
            $user = Users::find($id);
            $this->render('users/edit', ['user' => $user]);
        } catch (\Throwable $th) {
            (new Controller())->abort(404);
        }
    }
    public function update($id){
        try {
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
            return Users::update($id, $data);
        } catch (\Throwable $th) {
            (new Controller())->abort(404);
        }
        // var_dump($user);
        // die();
        // $this->render('welcome');
    }
    public function destroy($id){
        try {
            return Users::delete($id);
        } catch (\Throwable $th) {
            (new Controller())->abort(404);
        }
    }
    
}