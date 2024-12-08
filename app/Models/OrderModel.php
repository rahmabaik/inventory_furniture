<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_id', 'total', 'order_date'];


   
        public function getOrderDetails()
    {
        return $this->select('orders.*,customers.name as Customers_name,customers.ID as Customer_ID ')
                    ->join('customers', 'customers.id = orders.customer_id')
                    ->findAll();
    }
}
