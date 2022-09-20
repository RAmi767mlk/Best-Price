<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;

use DB;

use Session;

session_start();

class productController extends Controller
{
    /**
     * verify first that admin loged in already
     * 
     */

    public function adminAuth()
    {
        $adminID = Session::get('admin_id');
        if ($adminID) {
            return;
        } else {
            return Redirect::to('/admin')->send();
        }
    }

    /**
     * Show admin add Products page
     * 
     */

    public function index()
    {
        $this->adminAuth();
        return view('admin.addProducts');
    }

    public function addProducts(Request $request)
    {
        $data = array();

        $data['product_id'] = $request->productId;
        $data['category_id']= $request->productCategory;
        $data['product_name'] = $request->productName;
        $data['product_category'] = $request->productCategory;
        $data['product_price'] = $request->productPrice;
        $data['product_color'] = $request->productColor;
        $data['product_description'] = $request->productDescription;
        $data['product_overview'] = $request->productOverview;
        $data['product_specification'] = $request->productSpecification;
        $data['product_status'] = $request->productStat;

        $image = $request->file('productImage');

        if ($image) {
            $image_name = str_random(20);
             $ext = strtolower($image->getClientOriginalExtension());
             $image_full_name = $image_name . '.' . $ext;
             $upload_path = 'images/';

             $image_url = $upload_path . $image_full_name;
             $success = $image->move($upload_path, $image_full_name);

             if ($success) {
                 $data['product_image'] = $image_url;

                 DB::table('tbl_product')->insert($data);
                 Session::put('msg', 'Product Added Successfully !!');
                 return Redirect::to('/addproduct');
             }
         }

         $data['product_image'] = '';

        DB::table('tbl_product')->insert($data);
        Session::put('msg', 'Product Added Successfully Without Image !!');

        return Redirect::to('/addproduct');
    }

    public function allProduct()
    {
        $this->adminAuth();

        $allProduct = DB::table('tbl_product')
            ->join('tbl_category', 'tbl_product.product_category', '=', 'tbl_category.category_id')
            ->select('tbl_product.*', 'tbl_category.category_name')
            ->get();
        $manageProduct = view('admin.allProducts')
            ->with('allProduct', $allProduct);

        return view('adminLayout')
            ->with('admin/allProduct', $manageProduct);
    }

    public function deactivateProduct($productId)
    {
        DB::table('tbl_product')
            ->where('product_id', $productId)

            ->update(["product_status" => 0]);
        Session::put('msg', 'Product Deactivated Successfully !!');
        return Redirect::to('/allproduct');
    }

    public function activateProduct($productId)
    {
        DB::table('tbl_product')
            ->where('product_id', $productId)

            ->update(["product_status" => 1]);
        Session::put('msg', 'Product Activated Successfully !!');
        return Redirect::to('/allproduct');
    }


    public function deleteProduct($productId)
    {
        DB::table('tbl_product')
            ->where('product_id', $productId)
            ->delete();

        Session::put('msg', 'Item Deleted Successfully !!');
        return Redirect::to('/allproduct');
    }

    public function editProduct($productId)
    {
        $productInfo = DB::table('tbl_product')
            ->where('product_id', $productId)
            ->first();

        $showProductInfo = view('admin.updateProducts')
            ->with('productInfo', $productInfo);

        return view('adminLayout')
            ->with('admin/updateProducts', $showProductInfo);
    }


    // public function updateProduct(Request $request, $productId)
    // {
    //     $data = array();

    //     $data['product_name'] = $request->productName;
    //     $data['category_id']= $request->categoryId;
    //     $data['product_category'] = $request->productCategory;
    //     $data['product_price'] = $request->productPrice;
    //     $data['product_color'] = $request->productColor;
    //     $data['product_description'] = $request->productDescription;
    //     $data['product_overview'] = $request->productOverview;
    //     $data['product_specification'] = $request->productSpecification;
    //     $data['product_status'] = $request->productStat;

    //     $image = $request->file('productImage');

    //     if ($image) {
    //         $image_name = str_random(20);
    //         $ext = strtolower($image->getClientOriginalExtension());
    //         $image_full_name = $image_name . '.' . $ext;
    //         $upload_path = 'images/';

    //         $image_url = $upload_path . $image_full_name;
    //         $success = $image->move($upload_path, $image_full_name);

    //         if ($success) {
    //             $data['product_image'] = $image_url;

    //             DB::table('tbl_product')
    //                 ->gc_mem_caches
    //                 ->update($data);
    //             Session::put('msg', 'Product Added Successfully !!');
    //             return Redirect::to('/allproduct');
    //         }
    //     }

    //     $data['product_image'] = '';
    //     DB::table('tbl_product')->update($data);
    //     Session::put('msg', 'Product Added Successfully Without Image !!');

    //     return Redirect::to('/allproduct');
    // }
}
