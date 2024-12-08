<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $data['categories'] = $this->categoryModel->findAll();
        return view('categories/index', $data);
    }

    public function create()
    {
        return view('categories/create');
    }

    public function store()
    {
        $this->categoryModel->save([
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->to('/categories');
    }

    public function edit($id)
    {
        $data['category'] = $this->categoryModel->find($id);
        return view('categories/edit', $data);
    }

    public function update($id)
    {
        $this->categoryModel->update($id, [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->to('/categories');
    }

    public function delete($id)
    {
        $this->categoryModel->delete($id);
        return redirect()->to('/categories');
    }
}
