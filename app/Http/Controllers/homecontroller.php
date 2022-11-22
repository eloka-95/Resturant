<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;
use App\Models\Food;
use App\Models\Reservation;
use App\Models\chefs;
use App\Models\addcart;
use App\Models\order;

class homecontroller extends Controller
{
    public function index(){
        if(Auth::id()){
            return redirect('redirects');

        }else 
        
        $data = food::all();
        $data2=chefs::all();
        
        return view('home', compact("data", "data2"));
    }

    public function redirects(){
        $data = food::all();
        $data2 = chefs::all();

        $usertype = Auth::user()->usertype;

        if($usertype =='1'){
            return view('Admin.index');
        }
        else{
            $user_id = Auth::id();
            $count= addcart::where('user_id',$user_id)->count();


            return view('home', compact("data", "data2","count"));
        }
    }

    public function reservation(Request $request){
        $data= new Reservation;
        $data->name= $request->name;
        $data->email= $request->email;
        $data->phone= $request->phone;
        $data->guest= $request->guest;
        $data->date= $request->date;
        $data->time= $request->time;
        $data->massage= $request->massage;
        $data->save();
        return redirect()->back();


        
    }

    public function addcart(Request $request, $id){
        if(Auth::id()){
            $user_id = Auth::id();
            $food_id = $id;
            $quantity=$request->quantity;

            $cart = new addcart;
            $cart->user_id =$user_id;
            $cart->food_id =$food_id;
            $cart->quantity=$quantity;
            $cart->save();
            return redirect()->back();
        }else{
            return redirect('/login');
        }
    }

   

    public function showcart(Request $request,$id)
    {

        $count=addcart::where('user_id',$id)->count();

        if( Auth::id() == $id)
        {

            $data2=addcart::select('*')->where('user_id', '=' , $id)->get();

            $data=addcart::where('user_id',$id)->join('food', 'addcarts.food_id', '=' , 'food.id')->get();

            return view('showcart',compact('count','data','data2'));
        }


        else {

               return redirect()->back();
             }

    }

    public function removecart($id){
        $data= addcart::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function order(Request $request){
        foreach($request->foodname as $key=>$foodname){
            $data= new order;
        $data->foodname=$foodname;
        $data->price = $request->price[$key];
        $data->quantity = $request->quantity[$key];
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->address=$request->address;
        $data->save();
        }
        return redirect()->back();
    }

}