<?php

namespace App\Http\Services\Slider;

use App\Models\Slider;
// use App\Models\Menu;
// use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SliderService
{
    public function createslider($request)
    {
        $image = $request->input('file_slider');

        // $image = $request->file('image');
        // $manefull = $image->getClientOriginalName();
        // $namesau = $image->getClientOriginalExtension();
        // $truocimage = current(explode('.', $manefull));
        // $endname = $truocimage . rand(0, 999) . '.' . $namesau;
        // $image->move('uploads/sliders', $endname);
        Slider::create([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'image' => $image,
            'link' => $request->input('link'),
            'thu_tu' => $request->input('thu_tu'),
            'active' => $request->input('active'),
        ]);
    }

    public function getSlider()
    {
        return Slider::orderByDesc('id')->paginate(5);
    }

    public function getSliderHome()
    {
        return Slider::select('id', 'name', 'image')->where('active', 1)->orderby('thu_tu')->get();
    }
}
