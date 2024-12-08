<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\OrderItemModel;
use App\Models\FurnitureModel;

class OrderItemController extends BaseController
{
    protected $orderItemModel;
    protected $ordersModel;
    protected $furnitureModel;

    public function __construct()
    {
        $this->orderItemModel = new OrderItemModel();
        $this->ordersModel = new OrderModel(); // Memastikan OrdersModel dipanggil dengan benar
        $this->furnitureModel = new FurnitureModel();
    }

    /**
     * Menampilkan semua data Order Items dengan detail furniture
     */
    public function index()
    {
        $data['orderItems'] = $this->orderItemModel->getOrderItemsWithFurniture();
        return view('order_item/index', $data);
    }

    /**
     * Menampilkan form untuk menambahkan order item baru
     */
    public function create()
    {
        $data['orders'] = $this->ordersModel->findAll(); // Mengambil semua data dari tabel orders
        $data['furniture'] = $this->furnitureModel->findAll(); // Mengambil semua data dari tabel furniture

        return view('order_item/create', $data);
    }

    /**
     * Menyimpan data order item baru ke database
     */
    public function store()
    {
        $this->orderItemModel->save([
            'order_id' => $this->request->getPost('order_id'),
            'furniture_id' => $this->request->getPost('furniture_id'),
            'quantity' => $this->request->getPost('quantity'),
            'price' => $this->request->getPost('price'),
        ]);
        return redirect()->to('/order_item');
    }

    /**
     * Menampilkan form untuk mengedit order item berdasarkan ID
     */
    public function edit($id)
    {
        $data['orderItem'] = $this->orderItemModel->find($id);
        $data['orders'] = $this->ordersModel->findAll(); // Data orders untuk dropdown
        $data['furniture'] = $this->furnitureModel->findAll(); // Data furniture untuk dropdown

        return view('order_item/edit', $data);
    }

    /**
     * Memperbarui data order item berdasarkan ID
     */
    public function update($id)
    {
        $this->orderItemModel->update($id, [
            'order_id' => $this->request->getPost('order_id'),
            'furniture_id' => $this->request->getPost('furniture_id'),
            'quantity' => $this->request->getPost('quantity'),
            'price' => $this->request->getPost('price'),
        ]);
        return redirect()->to('/order_item');
    }

    /**
     * Menghapus order item berdasarkan ID
     */
    public function delete($id)
    {
        $this->orderItemModel->delete($id);
        return redirect()->to('/order_item');
    }
}
