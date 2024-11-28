<?php

namespace App\Controllers;

use App\Models\User;
use Config\Controller;

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
        User::insert($user);
        $this->render('index');
    }
    public function show(){
        $uri = $_SERVER['REQUEST_URI'];
        $pattern = '/^\/user\/([a-zA-Z0-9-]+)$/'; // Regular expression to match /user/{view}
        if (preg_match($pattern, $uri, $matches)) {
            $view = $matches[1];  // The {view} parameter
            var_dump($view);  // Display the captured view
        }
        var_dump($view); // This will show the 'view' parameter from the URL
        die();
        
        $uri = $_SERVER['REQUEST_URI'];
        var_dump( $uri );
        die();
        $user = User::find($id);
        $this->render('show',['user' => $user]);
    }
    
}