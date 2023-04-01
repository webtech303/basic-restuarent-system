<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Itemmaker;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    public $datas, $itemmakerdatas, $user_id, $foodid, $quantity, $count;
    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirects');
        }else

        $this->datas = Food::all();
        $this->itemmakerdatas = Itemmaker::all();
        return view('home'
            ,['datas'=>$this->datas]
            ,['itemmakerdatas'=>$this->itemmakerdatas]
        );
    }
    public function redirects()
    {

        $this->datas = Food::all();
        $this->itemmakerdatas = Itemmaker::all();
        $userType = Auth::user()->usertype;
        if($userType == 1)
        {
            return view('admin.adminHome');
        }
        else
        {
            $user_id = Auth::user()->id;
            $this->count = Cart::where('user_id', $user_id)->count();
            return view('home'
                ,['datas'=>$this->datas
                ,'itemmakerdatas'=>$this->itemmakerdatas
                ,'count'=>$this->count]
                );
        }
    }
    public function addcart(Request $request, $id)
    {

         if(Auth::id())
         {
             $user_id = Auth::user()->id;
             $food_id = $id ;
             $quantity = $request->quantity;
             $cart = new cart;
             $cart->user_id = $user_id;
             $cart->food_id = $request->food_id;
             $cart->quantity = $request->quantity;
             $cart->save();
             return redirect()->back();
         }
         else
             {
             return redirect('/login');
         }
    }
    public function showcart(Request $request, $id)
    {
        $this->count = Cart::where('user_id', $id)->count();
        $this->datas = Cart::where('user_id', $id)->join('food', 'carts.food_id', '=' , 'food.id')->get();
        return view('showcart',[
            'count'=>$this->count,
            'datas'=>$this->datas,
        ]);
    }
    public function orderconfirm(Request $request)
    {
        foreach($request->foodname as $key =>$foodname)
        {
            $data = new order;
            $data->foodname = $foodname;
            $data->price = $request->price[$key];
            $data->quantity = $request->quantity[$key];
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->address = $request->address;
            $data->save();
        }
        return redirect()->back();
    }

}
