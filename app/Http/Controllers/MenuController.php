<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('id','desc')->get();
        return view('admin.menu.menuList',compact('menus'));
    }
    public function store(REQUEST $request)
    {
        $menu = new Menu();
        $menu->name= $request->name;
        $menu->price= $request->price;

        $menu->save();
        return redirect()->route('menu.list')->with('message','Menu Add Successfully');
    }
     public function edit($id)
     {
         $menu = Menu::find($id);
         return view('admin.menu.menuEdit',compact('menu'));
     }
     public function update(REQUEST $request,$id)
     {
         $menu = Menu::find($id);
         $menu->name= $request->name;
         $menu->price= $request->price;
         $menu->save();
         return redirect()->route('menu.list')->with('message','Menu Update Successfully');
     }
     public function delete($id)
     {
         $menu = Menu::find($id);
         $menu->delete();
         return redirect()->route('menu.list')->with('message','Menu Delete Successfully');
     }
}
