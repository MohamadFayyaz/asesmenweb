<?php

namespace App\Http\Controllers;

use App\Models\MenuModel;
use Illuminate\Http\Request;

class PosController extends Controller
{
    //
    public function home()
    {
        return view('home');
    }
    public function pos()
    {
        $menus = MenuModel::all();
        $data = [
            'menus' => $menus,
        ];
        return view('pos.pos', $data);
    }
}
