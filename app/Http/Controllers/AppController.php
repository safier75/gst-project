<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Party;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AppController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard');
    }

    public function about()
    {
        return view("about");
    }

    // Function to soft delete
    public function delete($table, $id)
    {
        $param = array('is_deleted' => 1);
        DB::table($table)->where('id', $id)->update($param);

        // Redirect back
        return redirect()->back()->withStatus("Record deleted successfully");
    }
    public function profile(){
        $id =Auth::user()->id;
        $user = User::where('id',$id)->first();
        return view('profile',['user'=>$user]);
    }
    public function update_profile(Request $request,$id){
        //dd($request->image);
        $user= User::find($id);
        $name=$user->image;

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $imageName = time().'.'.$request->image->extension();  
         
        $request->image->move(public_path('assets/images/users'), $imageName);
        
        $user->name= $request->get('name');
        
        $user->email= $request->get('email');
        $user->image= $imageName;
        $user->mobile= $request->get('mobile');
        $user->save();
        
       
        return back()
                    ->with('success', 'You have successfully upload image.')
                    ->with('image', $imageName);
        
    }
}
