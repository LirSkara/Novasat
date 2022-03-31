<?php

namespace App\Http\Controllers;

use App\Models\Carousel;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_panel(){
        return view('admin.main_panel');
    }

    public function c_carousel(){
        $carousel = new Carousel;
        return view('admin.carousel', ['carousel' => $carousel->all()]);
    }

    public function add_carousel(Request $data){
        $valid = $data->validate([
            'image' => ['required', 'image', 'mimetypes:image/jpeg,image/png,image/webp'],
            'name' => ['required'],
            'first_text' => ['required'],
            'description' => ['required'],
            'text_price' => ['required'],
            'price' => ['required']
         ]); 

        $file = $data->file('image');
        $upload_folder = 'public/carousel/'; //Создается автоматически
        $filename = $file->getClientOriginalName(); //Сохраняем исходное название изображения
        Storage::putFileAs($upload_folder, $file, $filename); 

        $carousel = new Carousel();
        $carousel->image = $filename;
        $carousel->name = $data->input('name');
        $carousel->first_text = $data->input('first_text');
        $carousel->description = $data->input('description');
        $carousel->text_price = $data->input('text_price');
        $carousel->price = $data->input('price');
        $carousel->save();

        return redirect()->route('c_carousel');
    }

    public function edit_carousel(Request $data, $id){
        $valid = $data->validate([
            'image' => ['image', 'mimetypes:image/jpeg,image/png,image/webp'],
            'name' => ['required'],
            'first_text' => ['required'],
            'description' => ['required'],
            'text_price' => ['required'],
            'price' => ['required']
        ]); 
        
        $carousel = Carousel::find($id);
        if($data->file('image') != '') {
            $upload_folder = 'public/carousel/'; //Создается автоматически
            $file = $data->file('image');
            $filename = $file->getClientOriginalName();
            Storage::delete($upload_folder . '/' . $carousel->foto);
            Storage::putFileAs($upload_folder, $file, $filename);    
            $carousel->image = $filename;
            Storage::putFileAs($upload_folder, $file, $filename); 
        } else {
            $carousel->image = $carousel->image;
        }
        
        $carousel->name = $data->input('name');
        $carousel->first_text = $data->input('first_text');
        $carousel->description = $data->input('description');
        $carousel->text_price = $data->input('text_price');
        $carousel->price = $data->input('price');
        $carousel->save();

        return redirect()->route('c_carousel');
    }

    public function delete_carousel($id){
        Carousel::find($id)->delete();
        return redirect()->route('c_carousel');
    }
}
