<?php

namespace App\Controllers;

use App\Models\InventoryTransactionsModel;
use App\Models\furnitureModel;


class InventoryTransactionController extends BaseController
{
    protected $inventoryTransactionModel;
    protected $furnitureModel;

    public function __construct()
    {
        $this->inventoryTransactionModel = new InventoryTransactionsModel();
        $this->furnitureModel = new furnitureModel();
    }

    public function index()
    {
        $data['transactions'] = $this->inventoryTransactionModel->getTransactionsWithFurniture();
        return view('Inventory Transaction/index', $data);
    }

    public function create()
    {
        $data['furnitures']=$this->furnitureModel->findAll();

        return view('Inventory Transaction/create',$data);
    }

    public function store()
    {
        $this->inventoryTransactionModel->save([
            'furniture_id' => $this->request->getPost('furniture_id'),
            'transaction_type' => $this->request->getPost('transaction_type'),
            'quantity' => $this->request->getPost('quantity'),
            'transaction_date' => $this->request->getPost('transaction_date'),
        ]);
        return redirect()->to('/inventory_transaction');
    }

    public function edit($id)
    {
        $data['transaction'] = $this->inventoryTransactionModel->find($id);
        return view('Inventory Transaction/edit', $data);
    }

    public function update($id)
    {
        $this->inventoryTransactionModel->update($id, [
            'furniture_id' => $this->request->getPost('furniture_id'),
            'quantity' => $this->request->getPost('quantity'),
            'transaction_type' => $this->request->getPost('transaction_type'),
            'transaction_date' => $this->request->getPost('transaction_date'),
        ]);
        return redirect()->to('/inventory_transaction');
    }

    public function delete($id)
    {
        $this->inventoryTransactionModel->delete($id);
        return redirect()->to('/inventory_transaction');
    }
}
