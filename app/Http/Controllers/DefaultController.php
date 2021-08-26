<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
class DefaultController extends Controller
{
    public function get_menu_price($id)
    {
        
        $price  = Menu::where('id',$id)->first()->price;

        return response()->json($price);
    }
}
