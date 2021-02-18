<?php

namespace App\Controllers;

use App\Models\KnowledgeModel;
use CodeIgniter\Controller;

/**
 * Controller File of the users.
 * 
 * @author Asfia <asfia@gmail.com>
 * @since 2021 feb 08
 */

 class KnowledgeController extends Controller {

    /**
     * Funtion for the the all of users.
     * 
     * @author Asfia <asfia@gmail.com>
     * @since 2021 feb 08
     
     * @return mixed
     */
    public function index() {
        $model = New KnowledgeModel();
        $data['knowledges'] = $model->orderBy('id', 'DESC')
        ->join('')
        ->findAll();
        return view('knowledges/knowledge_view', $data);
    }

    /**
     * Funtion for input the users.
     * 
     * @author Asfia <asfia@gmail.com>
     * @since 2021 feb 08
     
     * @return mixed
     */
    public function add() {
        $model = New KnowledgeModel();
        $data['categories'] = $model->getCategories();
        return view('knowledges/knowledge_input', $data);
    }

    /**
     * Funtion for stored the data into datase.
     * 
     * @author Asfia <asfia@gmail.com>
     * @since 2021 feb 08
     
     * @return mixed
     */
    public function save() {
        $model = new KnowledgeModel();
        $data = [
            'title' => $this->request->getVar('title'),
            'description'  => $this->request->getVar('desc'),
            'category_id'  => $this->request->getVar('category_id'),
            'user_id' => 2
        ];
        $model->insert($data);
        return $this->response->redirect(site_url('/knowledges'));
    }
 }