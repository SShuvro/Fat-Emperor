<?php

namespace App\Http\Controllers;

use App\Models\ProductCategoryModal;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    function index()
    {
        $tmpCategories = ProductCategoryModal::where([
            ['status', '>', 0]
        ])->orderBy('id', 'ASC')->get();
        $categories = array();
        $tmpValue = array();
        foreach ($tmpCategories as $tmpCategory) {
            $tmpValue['id'] = $tmpCategory->id;
            $tmpValue['name'] = $tmpCategory->name;
            $tmpValue['view_in_front'] = $tmpCategory->view_in_front;
            $tmpValue['status'] = $tmpCategory->status;

            array_push($categories, $tmpValue);
        }

        return view('backend.productCategory', compact('categories'));
    }



    function addProductCategory(Request $request)
    {
        // dd($request);

        $validateData = $request->validate([
            'name' => 'required',

        ]);

        $category = new ProductCategoryModal();
        $category->name = $request->name; 

        $category->save();

        return response()->json($category);
    }


    function detailsOfProductCategory($id)
    {
        $category = ProductCategoryModal::find($id);
        return response()->json($category);
    }


    function updateProductCategory(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required',
        ]);


        $categoryToUpdate = ProductCategoryModal::find($request->id);
        $categoryToUpdate->name = $request->name;

        $categoryToUpdate->save();

        return response()->json($categoryToUpdate);
    }


    function deleteProductCategory(Request $request)
    {
        $userToDelete = ProductCategoryModal::find($request->id);
        $userToDelete->status = 0;

        $userToDelete->save();

        return response()->json($userToDelete);
    }


    function showInFront(Request $request)
    {
        $fileToShow = ProductCategoryModal::find($request->id);
        $categoryStatus = $fileToShow->view_in_front;

        $categoryToChange = ProductCategoryModal::find($request->id);
        if ($categoryStatus == "1") {

            $categoryToChange->view_in_front = 0;
        } else {
            $categoryToChange->view_in_front = 1;
        }

        $categoryToChange->save();

        return response()->json($categoryToChange);
    }
}
