<?php

namespace App\Http\Controllers;

use App\Models\ProductCategoryModal;
use App\Models\ProductModal;
use App\Models\ProductSubCategoryModal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    function index()
    {
        $tmpProducts = ProductModal::where([
            ['status', '>', 0]
        ])->orderBy('id', 'ASC')->get();
        $products = array();
        $tmpValue = array();
        foreach ($tmpProducts as $tmpProduct) {
            $tmpValue['id'] = $tmpProduct->id;
            $tmpValue['name'] = $tmpProduct->name;
            $categoryId = ProductCategoryModal::find($tmpProduct->category);
            $tmpValue['category'] = $categoryId->name;
            $subcategoryId = ProductSubCategoryModal::find($tmpProduct->subcategory);
            $tmpValue['subcategory'] = $subcategoryId->name;
            $tmpValue['image'] = $tmpProduct->image;
            $tmpValue['description'] = $tmpProduct->description;
            $tmpValue['price'] = $tmpProduct->price;
            $tmpValue['view_in_front'] = $tmpProduct->view_in_front;
            $tmpValue['status'] = $tmpProduct->status;

            array_push($products, $tmpValue);
        }

        $categorys = ProductCategoryModal::where([
            ['status', '>', 0]
        ])->orderBy('id', 'ASC')->get();

        $subcategorys = ProductSubCategoryModal::where([
            ['status', '>', 0]
        ])->orderBy('id', 'ASC')->get();

        return view('backend.product', compact(['products', 'categorys', 'subcategorys']));
    }



    function addProduct(Request $request)
    {
        // dd($request);

        $validateData = $request->validate([
            'addProductName' => 'required',
            'addProductCategory' => 'required',
            'addProductSubCategory' => 'required',
            'addProductDescription' => 'required',
            'addProductPrice' => 'required',
            'addProductImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg'

        ]);

        $image = $request->file('addProductImage');
        $imageName = 'fatEmperor' . time() . '.' . $image->extension();
        $image->move(public_path('restaurantImages'), $imageName);

        $product = new ProductModal();
        $product->name = $request->addProductName;
        $product->category = $request->addProductCategory;
        $product->subcategory = $request->addProductSubCategory;
        $product->description = $request->addProductDescription;
        $product->price = $request->addProductPrice;
        $product->image =  $imageName;

        $product->save();

        return response()->json($product);
    }


    function detailsOfProduct($id)
    {
        $product = ProductModal::find($id);
        return response()->json($product);
    }
    function subCategorySelect($categoryId)
    {
        

        $categorySelectedId = ProductSubCategoryModal::where([
            ['status', '>', 0],
            ['category','=',$categoryId]
        ])->orderBy('id', 'ASC')->get();

        return response()->json($categorySelectedId);
    }

    function updateProduct(Request $request)
    {

        $validateData = $request->validate([
            'editProductName' => 'required',
            'editProductCategory' => 'required',
            'editProductSubCategory' => 'required',
            'editProductDescription' => 'required',
            'editProductPrice' => 'required'

        ]);

        $fileToDelete = ProductModal::find($request->editProductId);
        $productFilesName = $fileToDelete->image;

        if ($request->hasfile('editProductImage')) {
            if (File::exists(public_path('restaurantImages/' . $productFilesName))) {
                File::delete(public_path('restaurantImages/' . $productFilesName));
            } else {
                dd('File does not exists.');
            }
        }


        if ($request->hasfile('editProductImage')) {
            $image = $request->file('editProductImage');
            $imageName = $request->editServiceName . time() . '.' . $image->extension();
            $image->move(public_path('restaurantImages'), $imageName);
        }

        $productToUpdate = ProductModal::find($request->editProductId);

        $productToUpdate->name = $request->editProductName;
        $productToUpdate->category = $request->editProductCategory;
        $productToUpdate->subcategory = $request->editProductSubCategory;
        $productToUpdate->description = $request->editProductDescription;
        $productToUpdate->price = $request->editProductPrice;


        if ($request->hasfile('editProductImage')) {
            $productToUpdate->image = $imageName;
        }
        $productToUpdate->save();
        return response()->json($productToUpdate);
    }

    function deleteProduct(Request $request)
    {
        $fileToDelete = ProductModal::find($request->id);
        $productFilesName = $fileToDelete->image;


        if (File::exists(public_path('restaurantImages/' . $productFilesName))) {
            File::delete(public_path('restaurantImages/' . $productFilesName));
        } else {
            dd('File does not exists.');
        }

        $productToDelete = ProductModal::find($request->id);
        $productToDelete->status = 0;

        $productToDelete->save();

        return response()->json($productToDelete);
    }


    function showInFront(Request $request)
    {
        $fileToShow = ProductModal::find($request->id);
        $productStatus = $fileToShow->view_in_front;

        $productToChange = ProductModal::find($request->id);
        if ($productStatus == "1") {

            $productToChange->view_in_front = 0;
        } else {
            $productToChange->view_in_front = 1;
        }

        $productToChange->save();

        return response()->json($productToChange);
    }
}
