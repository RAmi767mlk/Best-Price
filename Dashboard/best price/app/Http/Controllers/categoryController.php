<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;

use DB;

use Session;

session_start();



class categoryController extends Controller
{
    /**
     * verify first that admin loged in already
     * 
     */

    public function adminAuth()
    {
        $adminId = Session::get('admin_id');

        if ($adminId) {
            return;
        } else {
            return Redirect::to('/admin')->send();
        }
    }

    /**
     * Show admin add category page
     * 
     */

    public function index()
    {
        $this->adminAuth();

        return view('admin.addCategory');
    }

    /**
     * Admin add category functionality that add category form work successfully
     * and save it to the database
     */

    public function addCategory(Request $request)
    {
        $data = array();

        $data['category_id'] = $request->categoryId;
        $data['category_name'] = $request->categoryName;
        $data['category_status'] = $request->categoryStat;

        DB::table('tbl_category')->insert($data);

        Session::put('msg', 'Category Added Successfully !!');
        return Redirect::to('/addcategory');
    }

    /**
     * Admin show all category from database that we inserted from addCategory function
     * 
     */


    public function allCategory()
    {
        $this->adminAuth();

        $allCategory = DB::table('tbl_category')->get();

        $showAllCategory = view('admin.allCategory')
            ->with('allCategory', $allCategory);

        return view('adminLayout')
            ->with('admin.allCategory', $showAllCategory);
    }

    /**
     * Admin category stat deactive function
     * 
     */

    public function deactiveCategory($categoryId)
    {
        DB::table('tbl_category')
            ->where('category_id', $categoryId)
            ->update(["category_status" => 0]);
        Session::put('msg', 'Category Status Deactivate Successfully !!');
        return Redirect::to('/allcategory');
    }

    /**
     * Admin category stat active function
     * 
     */

    public function activeCategory($categoryId)
    {
        DB::table('tbl_category')
            ->where('category_id', $categoryId)
            ->update(["category_status" => 1]);
        Session::put('msg', 'Category Status Activate Successfully !!');
        return Redirect::to('/allcategory');
    }

    /**
     * Admin category edit function
     * for edit category item we need to show old category info on their css form field
     */

    public function editCategory($categoryId)
    {
        $categoryInfo = DB::table('tbl_category')
            ->where('category_id', $categoryId)
            ->first();

        $showCateogryInfo = view('admin.updateCategory')
            ->with('categoryInfo', $categoryInfo);

        return view('adminLayout')
            ->with('admin.updateCategory', $showCateogryInfo);
    }

    /**
     * Admin category update function
     * after changing some thing then press the button save change
     */


    public function updateCategory(Request $request, $categoryId)
    {
        $data = array();

        $data['category_name'] = $request->categoryName;


        DB::table('tbl_category')
            ->where('category_id', $categoryId)
            ->update($data);

        Session::put('msg', 'Category Updated Successfully !!');
        return Redirect::to('/allcategory');
    }

    /**
     * Admin category update function
     * after changing some thing then press the button save change
     */

     public function deleteCategory($categoryId)
     {
        DB::table('tbl_category')
            ->where('category_id',$categoryId)
            ->delete();

        Session::put('msg','Category Deleted Successfully !!');
        return Redirect::to('/allcategory');
     }
}
