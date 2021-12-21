<?php

namespace App\Http\Controllers;

use Core\Controller;
use Core\Facades\View;
use Core\Facades\Route;
use App\Models\Category;
use Core\Validate\Validator;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();
        return View::render('categories.index', compact('categories'));
    }

    public function show($category)
    {
        $category = Category::find($category);
        return View::render('categories.show', compact('category'));
    }

    public function new()
    {
        // new
    }

    public function create(array $data)
    {
        Category::create($data);
        return Route::redirectName('categories.index');
    }

    public function edit($category)
    {
        // edit
    }

    public function update($category, array $data)
    {
        Category::update($category, $data);
        return Route::redirectName('categories.index');
    }
    
    public function delete($category)
    {
        Category::delete($category);
        return Route::redirectName('categories.index');
    }
}