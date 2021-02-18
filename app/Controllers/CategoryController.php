<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use CodeIgniter\Controller;

/**
 * Controller File of the users.
 * 
 * @author Asfia <asfia@gmail.com>
 * @since 2021 feb 08
 */

 class CategoryController extends Controller {

    /**
     * Funtion for the the all of users.
     * 
     * @author Asfia <asfia@gmail.com>
     * @since 2021 feb 08
     
     * @return mixed
     */
    public function index() {
        $category = New CategoryModel();
        $data['categories'] = $category->orderBy('id', 'DESC')->findAll();
        return view('categories/category_view', $data);
    }

    /**
     * Funtion for input the users.
     * 
     * @author Asfia <asfia@gmail.com>
     * @since 2021 feb 08
     
     * @return mixed
     */
    public function add() {
        return view('categories/category_input');
    }

    /**
     * Funtion for stored the data into datase.
     * 
     * @author Asfia <asfia@gmail.com>
     * @since 2021 feb 08
     
     * @return mixed
     */
    public function save() {
        $model = new CategoryModel();
        $data = [
            'title' => $this->request->getVar('title'),
            'description'  => $this->request->getVar('desc'),
            'user_id' => 2
        ];
        $model->insert($data);
        return $this->response->redirect(site_url('/categories'));
    }
 }