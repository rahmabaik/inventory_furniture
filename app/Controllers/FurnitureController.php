<?php

namespace App\Controllers;

use App\Models\FurnitureModel;
use App\Models\CategoryModel;

class FurnitureController extends BaseController
{
    protected $furnitureModel;
    protected $categoryModel;
    

    public function __construct()
    {
        $this->furnitureModel = new FurnitureModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $data['furniture'] = $this->furnitureModel->getFurnitureWithCategory();
        return view('furniture/index', $data);
    }

    public function create()
    {
        $data['categories'] = $this->categoryModel->findAll(); // Mengambil semua data kategori
        return view('furniture/create', $data);
        
    }

    public function store()
    {
        $this->furnitureModel->save([
            'name' => $this->request->getPost('name'),
            'category_id' => $this->request->getPost('category_id'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
        ]);

        return redirect()->to('/furniture');
    }

    public function edit($id)
    {
        $data['furniture'] = $this->furnitureModel->find($id);
        return view('furniture/edit', $data);
    }

    public function update($id)
    {
        $this->furnitureModel->update($id, [
            'name' => $this->request->getPost('name'),
            'category_id' => $this->request->getPost('category_id'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
        ]);

        return redirect()->to('/furniture');
    }

    public function delete($id)
    {
        $this->furnitureModel->delete($id);
        return redirect()->to('/furniture');
    }
}
