<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderItemModel extends Model
{
    protected $table = 'order_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['order_id', 'furniture_id', 'quantity', 'price'];

    /**
     * Get order items with related furniture and order details.
     */
    public function getOrderItemsWithFurniture()
    {
        return $this->select(
            'order_items.*, 
             furniture.name as furniture_name, 
             furniture.description as furniture_description, 
             furniture.price as furniture_price, 
             furniture.category_id as furniture_category_id, 
             orders.ID as orders_id'
             
        )
        ->join('furniture', 'furniture.ID = order_items.furniture_id', 'left') // Using LEFT JOIN for more flexibility
        ->join('orders', 'orders.ID = order_items.order_id', 'left') // LEFT JOIN in case some order_items don't have orders
        ->findAll();
    }
}
