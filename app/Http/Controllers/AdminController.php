<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\Itemmaker;
use App\Models\Order;

class AdminController extends Controller
{
    public $datas, $user, $data, $itemmakerdatas;

    public function user()
    {
        $this->datas = User::all();
        return view('admin.users', ['datas' => $this->datas]);
    }

    public function deleteUser($id)
    {
        $this->user = User::find($id);
        $this->user->delete();
        return redirect()->back();
    }

    public function foodmenu()
    {
        $this->datas = Food::all();
        return view('admin.foodmenu', ['datas' => $this->datas]);
    }

    public function uploaditem(Request $request)
    {
        $data = new food;
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('admin/assets/image/itemimage', $imagename);
        $data->image = $imagename;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();
        return redirect()->back()->with('message', 'Item Added successfully!');
    }

    public function deleteItem($id)
    {
        $this->data = Food::find($id);
        $this->data->delete();
        return redirect()->back();
    }
    public function updateItems($id)
    {
        $this->datas = Food::find($id);
        return view('admin.updateView',['datas'=>$this->datas]);
    }
    public function updateItem(Request $request, $id)
    {
        $this->datas = Food::find($id);
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('admin/assets/image/itemimage', $imagename);
        $this->datas->image = $imagename;
        $this->datas->title = $request->title;
        $this->datas->price = $request->price;
        $this->datas->description = $request->description;
        $this->datas->save();
        return redirect()->back()->with('message', 'Item update successfully!');
    }

    public function reservation(Request $request)
    {
        $data = new reservation;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->guest = $request->guest;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->message = $request->message;
        $data->save();
        return redirect()->back()->with('message', 'Reservation Added successfully!');
    }

    public function viewreservation(Request $request)
    {
        if(Auth::id()){
        $this->datas = Reservation::all();
        return view('admin.adminreservation', ['datas' => $this->datas]);
        }
        else
        {
            return redirect('login');
        }
    }
    public function itemmaker()
    {
        $this->itemmakerdatas = Itemmaker::all();
        return view('admin.adminitemmaker',['itemmakerdatas'=>$this->itemmakerdatas]);
    }
    public function uploaditemmaker(Request $request)
    {
        $data = new itemmaker;
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('admin/assets/image/itemmaker', $imagename);
        $data->image = $imagename;
        $data->name = $request->name;
        $data->speciality = $request->speciality;
        $data->save();
        return redirect()->back()->with('message', 'Item Maker Added successfully!');
    }
    public function deleteitemmaker($id)
    {
        $this->itemmakerdata = Itemmaker::find($id);
        $this->itemmakerdata->delete();
        return redirect()->back();
    }
    public function updateitemmakers($id)
    {
        $this->itemmakerdatas = Itemmaker::find($id);
        return view('admin.updateitemmakers',['itemmakerdatas'=>$this->itemmakerdatas]);
    }
    public function updateitemmaker(Request $request, $id)
    {
        $this->itemmakerdata = Itemmaker::find($id);
        $image = $request->image;
        if($image)
        {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('admin/assets/image/itemmaker', $imagename);
            $this->itemmakerdata->image = $imagename;
        }
        $this->itemmakerdata->name = $request->name;
        $this->itemmakerdata->speciality = $request->speciality;
        $this->itemmakerdata->save();
        return redirect()->back()->with('message', 'Item Maker Info Updated successfully!');
    }

    public function orders()
    {
        $this->datas = Order::all();
        return view('admin.orders',['datas'=>$this->datas]);
    }
}
