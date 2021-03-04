<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * User model file
 * 
 * @author Asfia <asfia@gmail.com>
 * @since 2021 Feb 08
 */

 class KnowledgeModel extends Model {

    /**
     * The name of the table
     */
    protected $table = 'knowladges';

    /**
     * Primary key of the table.
     */
    protected $primaryKey = 'id';

    /**
     * Array of the all of field that allowed to access.
     */
    protected $allowedFields = [
        'title', 
        'description',
        'user_id',
        'category_id',
        'created_at',
        'updated_at',
        'deleted_at'

    ];

    /**
     * Get Category of knowledge
     */
    public function getCategories() {
        return $this->db->query("SELECT * FROM categories")->getResult();
    }

    /**
     * Get knowladge
     */
    public function getKnowladges() {
        $db      = \Config\Database::connect();
        $builder = $db->table('knowladges');
        $builder->select(
            "knowladges.title,"
            ."knowladges.description,"
            ."knowladges.created_at,"
            ."knowladges.deleted_at,"
            ."categories.title AS 'category',"
            ."users.fullname AS 'author',"
        );
        $builder->join('categories', 'categories.id = knowladges.category_id', 'inner');
        $builder->join('users', 'users.id = knowladges.user_id', 'inner');
        return $builder->get();
    }

 }