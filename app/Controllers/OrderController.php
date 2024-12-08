<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\customerModel;

class OrderController extends BaseController
{
    protected $orderModel;
    protected $customerModel;

    public function __construct()
    {
        $this->orderModel = new OrderModel();
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        $data['orders'] = $this->orderModel->getOrderDetails();
        return view('orders/index', $data);
    }

    public function create()
    {   
        $data['data'] = $this->customerModel->findAll();
        return view('orders/create',$data);
        dd();
    }

    public function store()
    {
        $this->orderModel->save([
            'customer_id' => $this->request->getPost('customer_id'),
            'total' => $this->request->getPost('total'),
            'order_date' => $this->request->getPost('order_date'),
        ]);
        return redirect()->to('/orders');
    }

    public function edit($id)
    {
        $data['order'] = $this->orderModel->find($id);
        return view('orders/edit', $data);
    }

    public function update($id)
    {
        $this->orderModel->update($id, [
            'customer_id' => $this->request->getPost('customer_id'),
            'total' => $this->request->getPost('total'),
            'order_date' => $this->request->getPost('order_date'),
        ]);
        return redirect()->to('/orders');
    }

    public function delete($id)
    {
        $this->orderModel->delete($id);
        return redirect()->to('/orders');
    }
}
