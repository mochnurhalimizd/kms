<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

/**
 * Controller File of the users login.
 * 
 * @author Asfia <asfia@gmail.com>
 * @since 2021 feb 08
 */

 class LoginController extends Controller {
     

    /**
     * Funtion for the the all of users.
     * 
     * @author Asfia <asfia@gmail.com>
     * @since 2021 feb 08
     
     * @return mixed
     */
    public function index() {
        return view('login/login');
    }

    /**
     * Funtion for login the users.
     * 
     * @author Asfia <asfia@gmail.com>
     * @since 2021 feb 08
     
     * @return mixed
     */
    public function auth() {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $data = $model->where('email', $email)->first();
        if($data){
            $ses_data = [
                'user_id'       => $data['id'],
                'fullname'     => $data['fullname'],
                'email'    => $data['email'],
                'logged_in'     => TRUE
            ];
            $session->set($ses_data);
            return redirect()->to('/users');
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/login');
        }
    }
 }