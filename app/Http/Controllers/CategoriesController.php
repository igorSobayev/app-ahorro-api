<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CategoriesController extends Controller
{
    //

    public function allCategories(Request $request)
    {

        $categories = Category::select(
            'id_category',
            'name',
            'literal_name',
            'descr',
            'literal_descr',
            'img',
            'color',
            'status'
        )->where('status', true)->get();

        return response(["data" => ["categories" => $categories]], 200);
    }
}
