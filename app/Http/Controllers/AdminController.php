<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\facades\Auth;

use App\Models\User;
use App\Models\food;
use App\Models\reservation;
use App\Models\chefs;
use App\Models\order;
class AdminController extends Controller
{
    

    public function user(){
        $data = user::all();

        return view('Admin.user', compact('data'));
    }

    public function deleteuser($id){
        $data = user::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function deletemenu($id){
        $data= food::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function foodmenu(){
        $data = food::all();
    
        return view('Admin.foodmenu', compact("data"));
    }

    public function updateview($id){
        $data = food::find($id);
    
        return view('Admin.update', compact("data"));
    }

    public function update(Request $request, $id){
        $data = food::find($id);
        $image= $request->image;
        $imageName=time().'.'.$image->getclientOriginalExtension();
        $request->image->move('foodimage', $imageName);
        $data->image=$imageName;
        $data->title= $request->title;
        $data->price= $request->price;
        $data->description= $request->description;
        $data->save();
        return redirect()->back();
        
    }

    public function upload(Request $request){
        $data = new food;
        $image= $request->image;
        $imageName=time().'.'.$image->getclientOriginalExtension();
        $request->image->move('foodimage', $imageName);
        $data->image=$imageName;
        $data->title= $request->title;
        $data->price= $request->price;
        $data->description= $request->description;
        $data->save();
        return redirect()->back();
    }

    public function adminreserv(){
        if(Auth::id()){
            $data = reservation::all();
        return view('Admin.Adminreservation', compact('data'));
        }else{
            return redirect('login');
        }
        
    }
    public function chefsview(){
        $data= chefs::all();
        return view('Admin.chefsview', compact('data'));
    }
   
     public function chefsubmit(Request $request){
         $data= new chefs;
         $image= $request->image;
         $imageName=time().'.'.$image->getClientOriginalExtension();
         $request->image->move('chefsimage', $imageName);
         $data->image=$imageName;
         $data->name=$request->name;
         $data->specialty=$request->specialty;
         $data->save();
        return redirect()->back();
     }

     public function chefs(){
        $data = chefs::all();
        return view('chefs', compact('data'));
    }

    public function deletechefimg($id){
        $data = chefs::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updatechefimg($id){
        $data = chefs::find($id);
        return view('Admin.updatechef', compact('data'));
    }
    public function updatechef( Request $request, $id ){
        $data= chefs::find($id);
        $image= $request->image;
         $imageName=time().'.'.$image->getClientOriginalExtension();
         $request->image->move('chefsimage', $imageName);
         $data->image=$imageName;
         $data->name=$request->name;
         $data->specialty=$request->specialty;
         $data->save();
        return redirect()->back();
        
    }

    public function orderview(){

        $data = order::all();

        return view('Admin.order', compact('data'));
    }

    public function search(Request $request){
        $search=$request->search;
        $data = order::where('name', 'like', '%'.$search.'%')->get();
        return view('admin.order', compact('data'));
    }

}
