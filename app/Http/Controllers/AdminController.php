<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

use App\Models\Slide;
use App\Models\Advertising;
use App\Models\Stock;
use App\Models\Blocks;
use App\Models\Banner;
use App\Models\Servises;
use App\Models\Social_network;
use App\Models\Your_data;

class AdminController extends Controller
{
    public function index() {
        if(Advertising::count() == 0) {
            $add_advertising = new Advertising();
            $add_advertising->image = 'slider-bnr.jpg';
            $add_advertising->link = '/';
            $add_advertising->save();
        }

        if(Stock::count() == 0) {
            $add_stock = new Stock();
            
            $add_stock->image = 'default.jpg';
            $add_stock->name = 'Акция недели!';
            $add_stock->description = 'Сохраните до 50% своих финансов заказав установку на этой неделе.';
            $add_stock->btn_text = 'Заказать Сейчас';
            $add_stock->link = '/';
            $add_stock->save();
        }

        if(Blocks::count() == 0) {
            $add_block = new Blocks();
            
            $add_block->image = 'default1.jpg';
            $add_block->name = 'Smart Watch 2.0';
            $add_block->description = 'Space Gray Aluminum Case with
            Black/Volt Real Sport Band';
            $add_block->btn_text = 'Заказать Сейчас';
            $add_block->link = '/';
            $add_block->save();

            $add_block = new Blocks();
            
            $add_block->image = 'default2.jpg';
            $add_block->name = 'Smart Headphone';
            $add_block->description = 'Lorem ipsum dolor sit amet,
            eiusmod tempor incididunt ut labore.';
            $add_block->btn_text = 'Заказать Сейчас';
            $add_block->link = '/';
            $add_block->save();
        }

        if(Banner::count() == 0) {
            $add_banner = new Banner();
            $add_banner->name = 'Установка видеонаблюдения в вашем доме
            ваш дом будет под надёжной охраной.';
            $add_banner->description = 'Мы проведём установку всего за 1 день!';
            $add_banner->btn_text = 'Заказать Сейчас';
            $add_banner->link = '/';
            $add_banner->save();
        }

        if(Servises::count() == 0) {
            $add_servises = new Servises();
            $add_servises->icon = '<i class="lni lni-delivery"></i>';
            $add_servises->name = 'Быстрая доставка';
            $add_servises->description = 'При заказе от 5000 ₽ бесплатно';
            $add_servises->save();

            $add_servises = new Servises();
            $add_servises->icon = '<i class="lni lni-support"></i>';
            $add_servises->name = '24/7 Поддержка';
            $add_servises->description = 'Наши операторы всегда на связи';
            $add_servises->save();

            $add_servises = new Servises();
            $add_servises->icon = '<i class="lni lni-credit-cards"></i>';
            $add_servises->name = 'Онлайн оплата';
            $add_servises->description = 'Быстрая и безопасная оплата';
            $add_servises->save();

            $add_servises = new Servises();
            $add_servises->icon = '<i class="lni lni-reload"></i>';
            $add_servises->name = 'Быстрая замена';
            $add_servises->description = 'Мы заменим ваше оборудование';
            $add_servises->save();
        }

        if(Social_network::count() == 0) {
            $add_social_network = new Social_network();
            $add_social_network->icon = '<i class="lni lni-facebook-filled"></i>';
            $add_social_network->link = '/';
            $add_social_network->save();

            $add_social_network = new Social_network();
            $add_social_network->icon = '<i class="lni lni-twitter-original"></i>';
            $add_social_network->link = '/';
            $add_social_network->save();

            $add_social_network = new Social_network();
            $add_social_network->icon = '<i class="lni lni-instagram"></i>';
            $add_social_network->link = '/';
            $add_social_network->save();

            $add_social_network = new Social_network();
            $add_social_network->icon = '<i class="lni lni-skype"></i>';
            $add_social_network->link = '/';
            $add_social_network->save();
        }

        if(Your_data::count() == 0) {
            $add_your_data = new Your_data();
            $add_your_data->city = 'г. Дербент, ул. Буйнакского, 68 Б';
            $add_your_data->number = '+7 (999) 888 77 66';
            $add_your_data->mail = 'support@mail.com';
            $add_your_data->save();
        }


        return view('control_panel.index');
    }

    public function slide() {
        $slide = Slide::all();
        return view('control_panel.slide', ['slide' => $slide]);
    }

    public function all_slide() {
        $slide = new Slide;
        return json_encode($slide->all());
    }

    public function add_slider(Request $data) {
        $valid = $data->validate([
            'image' => ['required', 'image', 'mimetypes:image/jpeg,image/png,image/webp'],
            'link' => ['required'],
        ]);

        $slide = new Slide();
        $upload_folder = 'public/slide';
        $file = $data->file('image');
        $filename = rand().'_'.$file->getClientOriginalName();
        $slide->image = $filename;
        $slide->link = $data->input('link');
        $slide->save();
        Storage::putFileAs($upload_folder, $file, $filename);

        $slide = new Slide();
        return $slide->latest()->first();
    }

    public function edit_slider($id, Request $data) {
        $slide = Slide::find($id);

        if(!empty($data->image)) {
            $file = $data->file('image');
            $upload_folder = 'public/slide';
            $filename = rand().'_'.$file->getClientOriginalName();
            Storage::delete($upload_folder . '/' . $slide->image);
            $slide->image = $filename;
            Storage::putFileAs($upload_folder, $file, $filename);
        }

        $slide->link = $data->input('link');
        $slide->save();

        $imageSlide = $slide::find($id)->image;
        return $imageSlide;
    }

    public function delete_slider($id) {
        $slide = Slide::find($id);
        $upload_folder = 'public/slide';
        Storage::delete($upload_folder . '/' . $slide->image);
        Slide::find($id)->delete();
    }

    public function advertising() {
        return view('control_panel.advertising');
    }

    public function all_advertising() {
        $advertising = new Advertising();
        return json_encode($advertising->all());
    }

    public function edit_tising($id, Request $data) {
        $advertising = Advertising::find($id);

        if(!empty($data->image)) {
            $file = $data->file('image');
            $upload_folder = 'public/advertising';
            $filename = rand().'_'.$file->getClientOriginalName();
            Storage::delete($upload_folder . '/' . $advertising->image);
            $advertising->image = $filename;
            Storage::putFileAs($upload_folder, $file, $filename);
        }

        $advertising->link = $data->input('link');
        $advertising->save();

        $imageAdvertising = $advertising::find($id)->image;
        return $imageAdvertising;
    }

    public function stock() {
        return view('control_panel.stock');
    }

    public function all_stock() {
        $stock = new Stock();
        return json_encode($stock->all());
    }

    public function edit_stock($id, Request $data) {
        $stock = Stock::find($id);

        if(!empty($data->image)) {
            $file = $data->file('image');
            $upload_folder = 'public/stock';
            $filename = rand().'_'.$file->getClientOriginalName();
            if($stock->image != 'default.jpg'){
                Storage::delete($upload_folder . '/' . $stock->image);
            }
            $stock->image = $filename;
            Storage::putFileAs($upload_folder, $file, $filename);
        }

        $stock->name = $data->input('name');
        $stock->description = $data->input('description');
        $stock->btn_text = $data->input('btn_text');
        $stock->link = $data->input('link');
        $stock->save();

        $imageStock = $stock::find($id)->image;
        return $imageStock;
    }

    public function blocks() {
        return view('control_panel.blocks');
    }

    public function all_blocks() {
        $blocks = new Blocks();
        return json_encode($blocks->all());
    }

    public function edit_block($id, Request $data) {
        $block = Blocks::find($id);

        if(!empty($data->image)) {
            $file = $data->file('image');
            $upload_folder = 'public/blocks';
            $filename = rand().'_'.$file->getClientOriginalName();
            if($block->image != 'default1.jpg' && $block->image != 'default2.jpg'){
                Storage::delete($upload_folder . '/' . $block->image);
            }
            $block->image = $filename;
            Storage::putFileAs($upload_folder, $file, $filename);
        }

        $block->name = $data->input('name');
        $block->description = $data->input('description');
        $block->btn_text = $data->input('btn_text');
        $block->link = $data->input('link');
        $block->save();

        $imageBlock = $block::find($id)->image;
        return $imageBlock;
    }

    public function banner() {
        return view('control_panel.banner');
    }

    public function all_banner() {
        $banner = new Banner();
        return json_encode($banner->all());
    }

    public function edit_banner($id, Request $data) {
        $banner = Banner::find($id);
        $banner->name = $data->input('name');
        $banner->description = $data->input('description');
        $banner->btn_text = $data->input('btn_text');
        $banner->link = $data->input('link');
        $banner->save();
    }

    public function servises() {
        return view('control_panel.servises');
    }

    public function all_servises() {
        $servises = new Servises();
        return json_encode($servises->all());
    }

    public function edit_servises($id, Request $data) {
        $servises = Servises::find($id);
        $servises->icon = $data->input('icon');
        $servises->name = $data->input('name');
        $servises->description = $data->input('description');
        $servises->save();
    }

    public function social_network() {
        return view('control_panel.social_network');
    }

    public function all_social_network() {
        $social_network = new Social_network();
        return json_encode($social_network->all());
    }

    public function edit_social_network($id, Request $data) {
        $social_network = Social_network::find($id);
        $social_network->icon = $data->input('icon');
        $social_network->link = $data->input('link');
        $social_network->save();
    }

    public function your_data() {
        return view('control_panel.your_data');
    }

    public function all_your_data() {
        $your_data = new Your_data();
        return json_encode($your_data->all());
    }

    public function edit_your_data($id, Request $data) {
        $your_data = Your_data::find($id);
        $your_data->city = $data->input('city');
        $your_data->number = $data->input('number');
        $your_data->mail = $data->input('mail');
        $your_data->save();
    }
}
