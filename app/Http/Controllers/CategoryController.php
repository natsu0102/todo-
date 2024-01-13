<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
        public function create()
    {
        return view('todo.create');
    }
    public function store(Request $request, Category $category)
    {
        $input = $request['category'];
        $category->fill($input)->save();
        return redirect('/' . $category->id);
    }
}