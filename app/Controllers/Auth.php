<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Users;
class Auth extends BaseController
{

    protected $helpers = ['form'];
    
    public function index() {
        $session = session();
        $session->isLoggedIn = FALSE;
        return view('login');
    }

    public function register() {
        $users = new Users();
        return view('register');
    }

    public function store()
    {
        $rules = [
            'name'            => 'required',
            'email'           => 'required|valid_email',
            'password'        => 'required',
            'confirmpassword' => 'matches[password]'
        ];
          
        if($this->validate($rules)){
            $user = new Users();
            $data = [
                'name'     => $this->request->getVar('name'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];

            $user->save($data);
            return redirect()->to('/login');
        }else{
            $data['validation'] = $this->validator;
            echo view('register', $data);
        }
          
    }

    public function loginAuth()
    {
        $session = session();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $user = new Users();
        $data = $user->where('email', $email)->first();
        
        if($data && password_verify($password, $data['password'])){
                $ses_data = [
                    'id'         => $data['id'],
                    'name'       => $data['name'],
                    'email'      => $data['email'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/');
        } else {
            $session->setFlashdata('loginError', 'Email & Password is incorrect..!');
            return redirect()->to('/login');
        }
    }
}
