<?php

namespace App\Http\Controllers;

use App\Models\MenuModel;
use Illuminate\Http\Request;

use Illuminate\Support\Str;

class MenuController extends Controller
{
    //
    public function menu()
    {
        $menus = MenuModel::all();
        $data = [
            'menus' => $menus,
        ];
        return view('menu.menu', $data);
    }

    public function menu_add(Request $request)
    {
        return view('menu.menu_add');
    }

    public function menu_add_process(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'image' => 'image',
            ],
        );

        if ($request->file('image')) {
            $image = $request->file('image');
            $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path() . '/menu-images/', $nameImage);
            $validatedData['image'] = $nameImage;
        }
        MenuModel::create($validatedData);
        session()->flash('msg', "<strong>Berhasil.</strong> <br> Menu berhasil ditambahkan");
        session()->flash('msg_status', 'success');
        return redirect("/menu");
    }

    public function menu_edit(MenuModel $MenuModel)
    {
        $data = [
            'menu' => $MenuModel,
        ];
        // dd($data);
        return view('menu.menu_edit', $data);
    }

    public function menu_edit_process(Request $request)
    {
        $id = $request->input('id');

        $validatedData = $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'image' => 'image',
            ],
        );

        if ($request->file('image')) {
            $menu = MenuModel::where('id', $id)->first();
            if ($menu->image != NULL) {
                unlink(public_path('menu-images/') . $menu->image);
            }
            $image = $request->file('image');
            $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path() . '/menu-images/', $nameImage);
            $validatedData['image'] = $nameImage;
        }

        MenuModel::where('id', $id)->update($validatedData);
        session()->flash('msg', "<strong>Berhasil.</strong> <br> Menu berhasil diubah");
        session()->flash('msg_status', 'success');
        return redirect("/menu/edit/$id");
    }
    public function menu_delete(MenuModel $MenuModel)
    {
        unlink(public_path('menu-images/') . $MenuModel->image);
        MenuModel::where('id', $MenuModel->id)->delete();
        session()->flash('msg', "<strong>Berhasil.</strong> <br> Menu berhasil dihapus");
        session()->flash('msg_status', 'success');
        return redirect('/menu');
    }
}
