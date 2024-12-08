<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryTransactionsModel extends Model
{
    protected $table = 'inventory_transactions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['furniture_id', 'transaction_type', 'quantity', 'transaction_date'];

    public function getTransactionsWithFurniture()
    {
        return $this->select('inventory_transactions.*, furniture.name as furniture_name,furniture.ID as furniture_ID')
                    ->join('furniture', 'furniture.id = inventory_transactions.furniture_id')
                    ->findAll();
    }
}
