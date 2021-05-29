<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Content;
use App\Models\Country;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TodaysdealController extends Controller
{
    public function TodaysdealList()
    {
        $products = DB::table('todaysdeal')->latest()->get();

        return view('BackEnd.product.todaysDealsList',compact('products'));
    }


    public function TodaysdealCreate(Request $request)
    {
      $countries = Country::where('status',1)->get();
      $content = Content::where('status',1)->get();
      $banner = Banner::where('status',1)->get();
      $category = Section::with('categories')->get();
      $category = json_decode(json_encode($category),true);

//        echo "<pre>"; print_r($category); die;

      return view('BackEnd.product.todaysDeal_product',compact('category', 'countries', 'content','banner'));
    }

    public function active($id)
    {
        $pro = DB::table('todaysdeal')->where('id',$id)->update([
          'status' => 1,
        ]);
        return back()->with('sms','Product available in public');
    }
    public function inactive($id)
    {
        $pro = DB::table('todaysdeal')->where('id',$id)->update([
          'status' => 0,
        ]);
        return back()->with('sms','Product unavailable in public');
    }

    public function todaysdealDelete($id)
    {
        $pro = DB::table('todaysdeal')->where('id',$id)->delete();
        return back()->with('sms','Product is deleted!');
    }

    public function todaysdealsEdit($id)
    {
        $product = DB::table('todaysDeal')->where('id', $id)->first();
        return view('BackEnd.product.todaysdealEdit', compact('product'));
    }

    public function todaysdealsUpdate(Request $request)
    {

        $img_tmp = $request->file('product_img');

        if ($img_tmp) /* you can update with image */
        {
            $img_exten = $img_tmp->getClientOriginalExtension();
            $img_name = $img_tmp->getClientOriginalName().'.'.$img_exten;
            $img_path = public_path('Back/images/Product');
            $img_tmp->move($img_path, $img_name);

            DB::table('todaysdeal')->where('id', $request->product_id)->update([
              'product_name' => $request->product_name,
              'product_link' => str_slug($request->product_name),
              'product_price' => $request->product_price,
              'product_price_old' => $request->product_price_old,
              'content_id' => $request->content_id,
              'product_meta_description' => $request->product_meta_description,
              'product_description' => $request->product_description,
              'product_description' => $request->product_description,
              'product_description' => $request->product_description,
              'product_img' => $img_name,
            ]);
        }
        else /* you can update without image */
        {
          DB::table('todaysdeal')->where('id', $request->product_id)->update([
            'product_name' => $request->product_name,
            'product_link' => str_slug($request->product_name),
            'product_price' => $request->product_price,
            'product_price_old' => $request->product_price_old,
            'content_id' => $request->content_id,
            'product_meta_description' => $request->product_meta_description,
            'product_description' => $request->product_description,
          ]);
        }
        return back()->with('sms', 'Product Updated!');
    }

}
