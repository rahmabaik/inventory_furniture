<?php

namespace App\Models;

use CodeIgniter\Model;

class FurnitureModel extends Model
{
    protected $table = 'furniture';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'category_id', 'price', 'stock_quantity'];

    /**
     * Get furniture with related category details.
     */
    public function getFurnitureWithCategory()
    {
        return $this->select('furniture.*, categories.name as category_name')
                    ->join('categories', 'categories.id = furniture.category_id', 'left')
                    ->findAll();
    }
}
