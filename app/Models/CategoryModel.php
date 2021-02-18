<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * User model file
 * 
 * @author Asfia <asfia@gmail.com>
 * @since 2021 Feb 08
 */

 class CategoryModel extends Model {

    /**
     * The name of the table
     */
    protected $table = 'categories';

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
        'created_at',
        'updated_at',
        'deleted_at'

    ];
 }