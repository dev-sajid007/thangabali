<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Purchase;
class PurchaseController extends Controller
{
    public function add()
    {
        $menus = Menu::all();
        return view('admin.purchase.addPurchase',compact('menus'));
    }

    public function index()
    {
      $purchases = Purchase::orderBy('id','DESC')->get();
      return view('admin.purchase.purchaseList',compact('purchases'));
    }

    public function store(REQUEST $request)
    {
      
        if($request->menu_name == null)
        {
            return back()->with('message',"Sorry! You do not select any item");
        }
        else{
            $menu_name = count($request->menu_name);
            for($i=0;$i < $menu_name ;$i++)
            {
                $purchase = new Purchase();
                $purchase->date = date("Y-m-d",strtotime($request->date[$i]));
                $purchase->menu_name      = $request->menu_name[$i];
                $purchase->buying_qty   = $request->buying_qty[$i];
                $purchase->unit_price   = $request->unit_price[$i];
                $purchase->buying_price = $request->buying_price[$i];
                $purchase->save();

            }
        }
        return redirect()->back()->with('message','Data Saved Successfully');
    }


    public function edit($id)
    {
        $purchase = Purchase::find($id);
        return view('admin.purchase.purchaseEdit',compact('purchase'));
    }

    public function update(REQUEST $request,$id)
    {

        $purchase =Purchase::find($id);
        $purchase->date = date("Y-m-d",strtotime($request->date));
        $purchase->menu_name    = $request->menu_name;
        $purchase->buying_qty   = $request->buying_qty;
        $purchase->unit_price   = $request->unit_price;
        $purchase->buying_price = $request->buying_price;
        $purchase->update();
        return redirect()->route('purchase.list')->with('message','Data Update Successfully');


    }
    public function delete($id)
    {
        $purchase = Purchase::find($id);
        $purchase->delete();
        return redirect()->route('purchase.list')->with('message','Data Delete Successfully');
    }
}
