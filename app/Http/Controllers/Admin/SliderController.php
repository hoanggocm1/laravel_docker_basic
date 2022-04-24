<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\Slider\SliderService;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    //

    protected $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    public function addslider()
    {
        return view('admin.slider.add', [
            'title' => 'Thêm slider'
        ]);
    }

    public function createslider(Request $request)
    {
        $this->sliderService->createslider($request);

        return redirect()->back();
    }

    public function listproduct()
    {
        return view('admin.slider.list', [
            'title' => 'Danh sách slider',
            'sliders' => $this->sliderService->getSlider(),
        ]);
    }
    public function deleteslider(Slider $slider)
    {
        $id = $slider->id;
        Slider::where('id', $id)->delete();
        return redirect()->back();
    }
    public function slidertactive(Slider $slider)
    {
        $id = $slider->id;
        if ($slider->active == 1) {
            Slider::where('id', $id)->update(['active' => 0]);
        } else {
            Slider::where('id', $id)->update(['active' => 1]);
        }

        return redirect()->back();
    }

    public function editslider(Slider $slider)
    {
        return view('admin.slider.edit', [
            'title' => 'Sửa thông tin slider',
            'sliders' => $slider,
        ]);
    }
    public function updateslider(Request $request, Slider $slider)
    {

        $image = $request->input('file_slider');

        if ($image) {
            // $manefull = $image->getClientOriginalName();
            // $namesau = $image->getClientOriginalExtension();
            // $truocimage = current(explode('.', $manefull));
            // $endname = $truocimage . rand(0, 999) . '.' . $namesau;
            // $image->move('uploads/sliders', $endname);
            Slider::where('id', $slider->id)->update([
                'name' => $request->input('name'),
                'content' => $request->input('content'),
                'image' => $image,
                'link' => $request->input('link'),
                'thu_tu' => $request->input('thu_tu'),
                'active' => $request->input('active'),
            ]);


            // session()->flash('success','Tạo danh mục thành công');
            // return redirect()->back();
        } else {

            Slider::where('id', $slider->id)->update([
                'name' => $request->input('name'),
                'content' => $request->input('content'),
                'image' => $slider->image,
                'link' => $request->input('link'),
                'thu_tu' => $request->input('thu_tu'),
                'active' => $request->input('active'),
            ]);
        }

        session()->flash('success', 'Update thành công');
        return redirect()->back();
    }
}
