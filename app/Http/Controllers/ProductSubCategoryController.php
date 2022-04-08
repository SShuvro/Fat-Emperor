<?php

namespace App\Http\Controllers;

use App\Models\ProductCategoryModal;
use App\Models\ProductSubCategoryModal;
use Illuminate\Http\Request;

class ProductSubCategoryController extends Controller
{
    function index()
    {
        $tmpCategories = ProductSubCategoryModal::where([
            ['status', '>', 0]
        ])->orderBy('id', 'ASC')->get();
        $categories = array();
        $tmpValue = array();
        foreach ($tmpCategories as $tmpCategory) {
            $tmpValue['id'] = $tmpCategory->id;
            $tmpValue['name'] = $tmpCategory->name;
            $categoryId = ProductCategoryModal::find($tmpCategory->category);  
            $tmpValue['category'] = $categoryId->name;
            $tmpValue['view_in_front'] = $tmpCategory->view_in_front;
            $tmpValue['status'] = $tmpCategory->status;

            array_push($categories, $tmpValue);
        }

        $categorys = ProductCategoryModal::where([
            ['status', '>', 0]
        ])->orderBy('id', 'ASC')->get();

       

        return view('backend.productSubCategory', compact(['categories','categorys']));
    }



    function addProductSubCategory(Request $request)
    {
        // dd($request);

        $validateData = $request->validate([
            'name' => 'required',
            'category' => 'required',

        ]);

        $category = new ProductSubCategoryModal();
        $category->name = $request->name; 
        $category->category = $request->category; 

        $category->save();

        return response()->json($category);
    }


    function detailsOfProductSubCategory($id)
    {
        $category = ProductSubCategoryModal::find($id);
        return response()->json($category);
    }


    function updateProductSubCategory(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required',
            'category' => 'required',
        ]);


        $subCategoryToUpdate = ProductSubCategoryModal::find($request->id);
        $subCategoryToUpdate->name = $request->name;
        $subCategoryToUpdate->category = $request->category;

        $subCategoryToUpdate->save();

        return response()->json($subCategoryToUpdate);
    }


    function deleteProductSubCategory(Request $request)
    {
        $subCategoryToDelete = ProductSubCategoryModal::find($request->id);
        $subCategoryToDelete->status = 0;

        $subCategoryToDelete->save();

        return response()->json($subCategoryToDelete);
    }


    function showInFront(Request $request)
    {
        $fileToShow = ProductSubCategoryModal::find($request->id);
        $subCategoryStatus = $fileToShow->view_in_front;

        $subCategoryToChange = ProductSubCategoryModal::find($request->id);
        if ($subCategoryStatus == "1") {

            $subCategoryToChange->view_in_front = 0;
        } else {
            $subCategoryToChange->view_in_front = 1;
        }

        $subCategoryToChange->save();

        return response()->json($subCategoryToChange);
    }
}
