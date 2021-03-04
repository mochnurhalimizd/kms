<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * User model file
 * 
 * @author Asfia <asfia@gmail.com>
 * @since 2021 Feb 08
 */

 class DocumentModel extends Model {

    /**
     * The name of the table
     */
    protected $table = 'documents';

    /**
     * Primary key of the table.
     */
    protected $primaryKey = 'id';

    /**
     * Array of the all of field that allowed to access.
     */
    protected $allowedFields = [
        'knowladge_id', 
        'path',
        'title',
        'desc'
    ];
 }