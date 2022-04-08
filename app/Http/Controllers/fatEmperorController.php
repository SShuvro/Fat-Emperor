<?php

namespace App\Http\Controllers;

use App\Models\ProductCategoryModal;
use App\Models\ProductModal;
use App\Models\ProductSubCategoryModal;
use Illuminate\Http\Request;

class fatEmperorController extends Controller
{
    public function index()
    {
        $categories = ProductCategoryModal::where([
            ['status', 1],
            ['view_in_front', 1]
        ])->get();
        foreach ($categories as $category) {
            $subcategories = ProductSubCategoryModal::where([
                ['status', 1],
                ['view_in_front', 1],
                ['category', $category->id]
            ])->get();
            foreach ($subcategories as $subcategory) {
                $products = ProductModal::where([
                    ['status', 1],
                    ['view_in_front', 1],
                    ['category', $category->id],
                    ['subcategory', $subcategory->id]
                ])->get();
                $subcategory['products'] = $products;
            }
            $category['subcategories'] = $subcategories;
        }

        //dd($categories);

        // $tmpCategories = ProductModal::
        //                 join('productcategory','productcategory.id','=','product.category')
        //                ->join('productsubcategory','productsubcategory.id','=','product.subcategory')
        //                ->select('productcategory.name AS categoryName','productsubcategory.name as subCategoryName','product.name as productName')
        //                 ->get();

                        // dd($tmpCategories);
        

        return view('index', compact('categories'));
    }

    public function menu()
    {
        return view('menu');
    }
}
