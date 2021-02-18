<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

/**
 * Controller File of the users.
 * 
 * @author Asfia <asfia@gmail.com>
 * @since 2021 feb 08
 */

 class UserController extends Controller {
     

    /**
     * Funtion for the the all of users.
     * 
     * @author Asfia <asfia@gmail.com>
     * @since 2021 feb 08
     
     * @return mixed
     */
    public function index() {
        $user = New UserModel();
        $data['users'] = $user->orderBy('id', 'DESC')->findAll();
        return view('users/user_view', $data);
    }

    /**
     * Funtion for input the users.
     * 
     * @author Asfia <asfia@gmail.com>
     * @since 2021 feb 08
     
     * @return mixed
     */
    public function add() {
        return view('users/user_input');
    }

    /**
     * Funtion for stored the data into datase.
     * 
     * @author Asfia <asfia@gmail.com>
     * @since 2021 feb 08
     
     * @return mixed
     */
    public function save() {
        $userModel = new UserModel();
        $data = [
            'fullname' => $this->request->getVar('fullname'),
            'email'  => $this->request->getVar('email'),
            'phone'  => $this->request->getVar('phone'),
        ];
        $userModel->insert($data);
        return $this->response->redirect(site_url('/users'));
    }

    /**
     * Funtion for login the users.
     * 
     * @author Asfia <asfia@gmail.com>
     * @since 2021 feb 08
     
     * @return mixed
     */
    public function login() {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $data = $model->where('email', $email)->first();
        if($data){
            $ses_data = [
                'user_id'       => $data['user_id'],
                'fullname'     => $data['fullname'],
                'email'    => $data['email'],
                'logged_in'     => TRUE
            ];
            $session->set($ses_data);
            return redirect()->to('/dashboard');
        }else{
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/login');
        }
    }
 }