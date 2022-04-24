<?php

namespace App\Http\Controllers;

use App\Http\Requests\Password_admin\FormRequestPasswordAdmin;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;
use App\Http\Services\Slider\SliderService;
use App\Http\Services\Product\ProductService;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use App\Models\Shipping_order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    protected $menuService;
    protected $sliderService;
    protected $productService;
    public function __construct(
        MenuService $menuService,
        SliderService $sliderService,
        ProductService $productService
    ) {
        $this->menuService = $menuService;
        $this->sliderService = $sliderService;
        $this->productService = $productService;
    }

    public function index()
    {

        $carts = Session::get('carts');
        $customer = Session::get('customer');
        return view('main', [
            'title' => 'Cua hang dien tu',
            'menuParents' => $this->menuService->getParentHome(),
            'SliderHome' => $this->sliderService->getSliderHome(),
            'products' => $this->productService->get(),
            'carts' => $carts,
            'customer' => $customer
        ]);
    }


    public function dangnhap(Request $request)
    {
        // $this->validate($request, [
        //     'customer_email' => 'required|email:filter',
        //     'customer_password' => 'required'
        // ]);
        Session::get('customer');
        $a = Customer::get();
        foreach ($a as $value) {
            if ($request->input('customer_email') == $value->email && md5($request->input('customer_password')) == $value->customer_password) {
                // $b = [
                //     'name' => $value->name,
                //     'phone' => $value->phone,
                //     'email' => $value->email,
                //     'customer_password' => $value->customer_password,
                //     'address' => $value->address,
                // ];
                $c = Session::put('customer', $value);
                // return redirect('/');
                session()->flash('success', 'Đăng nhập thành công');
                return redirect()->back();
                // return dd($c);
            }
        }


        // if (Auth::attempt([
        //     'customer_email' => $request->input('customer_email'),
        //     'customer_password' => $request->input('customer_password')
        // ])) {
        //     return redirect()->route('addcart');
        // }

        session()->flash('error', 'Email hoặc mật khẩu không đúng');
        return  redirect()->back();
    }

    public function dangxuat()
    {
        Session::forget('customer');
        if (Session::get('carts') == null) {
            return redirect('/');
        }
        return redirect()->back();
    }
    public function dangky(Request $request)
    {
        Session::get('customer');
        if ($request->input('customer_password') == $request->input('customer_password_confirm')) {
            try {
                Session::get('customer');
                $customer = Customer::create([
                    'name' => $request->input('name'),
                    'phone' => $request->input('phone'),
                    'email' => $request->input('email'),
                    'customer_password' => md5($request->input('customer_password')),
                    'address' => $request->input('address'),
                ]);
                Session::put('customer', $customer);
                session()->flash('success', 'Đăng ký thành công.');
                return redirect()->back();
                return dd(Session::get('customer'));
            } catch (\Exception $erro) {
                Session::forget('customer');
                session()->flash('error', 'Đăng ký thất bại!');
                return redirect()->back();
            }
        }
        session()->flash('error', 'Đăng ký thất bại!');
        return redirect()->back();
    }

    public function infoCustomer(Customer $customer)
    {

        // $customer = Session::get('customer');
        $order = $customer->Order();

        // foreach ($order as $order1) {
        //     $order_detail1[] = Order_detail::where('order_id', $order1->id)->get();
        // }
        // foreach ($order as $order_detail12) {
        //     echo ($order_detail12->id);
        // }
        // dd($order1);

        // $dt = Carbon::now('Asia/Ho_Chi_Minh');
        // return dd($dt->toDateTimeString());

        return view('infoCustomer.info', [
            'title' => 'Thông tin tài khoản ' . $customer->name,
            'customer' => $customer,
            'order' => $order
        ]);
    }

    public function viewOrder(Order $order)
    {
        $order1 = Order::where('id', $order->id)->first();
        $order_detail = $order->detailOrder();
        $order_shipping = $order->shippingOrder();


        foreach ($order_detail as $value) {
            $img[] = Product::where('id', $value->product_id)->get();
        }
        foreach ($img as $image) {
            foreach ($image as $image1) {
                $c[] = $image1->image;
            }
        }

        return view('infoCustomer.viewOrder', [
            'title' => 'Chi tiết đơn hàng',
            'orderDetail' => $order_detail,
            'orderShipping' => $order_shipping,
            'order1' => $order1,
            'image' =>  $c,
        ]);
    }


    public function trangtest()
    {
        $a = Product::where('active', 1)->get();
        return view('test', [
            'title' => 'aa',
            'ProductHome' => $a

        ]);
    }

    public function loadmore()
    {

        $products = $this->productService->get();

        return view('loadmore', [
            'title' => 'loadmore san pham',
            'products' => $products
        ]);
    }

    public function loadmoreProduct(Request $request)
    {
        $page = $request->input('page');


        $result = $this->productService->getHome($request);
        // return dd($result);
        // $html = view('loadmore', ['products' => $result])->render();
        // return dd($html);
        // return view('test', [
        //     'html' => $html
        // ]);

        // $a = Product::orderByDesc('id')->where('active', 1)->get();
        $b = count($result);
        if (count($result) != 0) {
            $html = view('product.list', [
                'products' => $result,
                'title' => 'loadmore san pham'
            ])->render();
            return response()->json([
                'html' => $html,
                'dem' => $b
            ]);
        }
        return response()->json(['html' => '']);
    }

    public function loadmoreProduct11111($id, $idActive)
    {

        if ($idActive == 0) {
            Product::where('id', $id)->update(['active' => 1]);
        } else {
            Product::where('id', $id)->update(['active' => 0]);
        }




        return response()->json([
            'giatri' => $idActive,
            'id' => $id
        ]);
    }

    public function testMail($id)
    {

        // $name = 'Nguyễn Hoàng'; // cái biến mình chuyền vàoid
        // Mail::send('testMail', compact('name'), function ($email) use ($name) {
        //     $email->subject('Đặt hàng thành công.');
        //     $email->to('hoanggocm10101@gmail.com', $name);
        // });

        $customer = Session::get('customer');
        $customer_email = $customer->email;

        $order1 = Order::where('id', $id)->first();
        // $order1->shippingOrder();
        $order_detail = Order_detail::where('order_id', $id)->get();
        $tong = 0;
        foreach ($order_detail as $value) {
            $tong += $value->order_qty * $value->order_price;
        }
        $order_shipping = Shipping_order::where('order_id', $id)->first();
        // foreach ($order_detail as $value) {
        //     $img[] = Product::where('id', $value->product_id)->get();
        // }
        // foreach ($img as $image) {
        //     foreach ($image as $image1) {
        //         $c[] = $image1->image;
        //     }
        // }
        // return dd($order_shipping);
        $name = $order_shipping->shipping_name; // cái biến mình chuyền vàoid
        Mail::send('testMail', compact('name', 'order1', 'order_shipping', 'tong', 'customer_email'), function ($email) use ($name, $order1, $order_shipping, $tong, $customer_email) {
            $email->subject('Đặt hàng thành công.');
            $email->to($customer_email, $name, $order1, $order_shipping, $tong,);
        });

        return view('checkout.thankyou', [
            'title' => 'Thanh toan'
        ]);
    }
}
