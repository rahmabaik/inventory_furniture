<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'contac_person', 'phone' , 'email' , 'address'];
}
