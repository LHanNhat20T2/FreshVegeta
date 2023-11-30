<?php

namespace App\Http\Controllers\Frontend;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
    }

    public function profile()
    {   
        return view('Frontend.Profile.profile');
    }

    public function update(Request $request)
    {
        $userId = Auth::id();
        
        $user = User::findOrFail($userId);

        $data = $request->all();

        if($data['pass']){
            $data['pass'] = bcrypt($data['pass']);
        }else{
            $data['pass']= $user->password;
        }

        if($request->hasFile('filesTest')){
            $file = $request->file('filesTest');

            $data['avatar'] = $file->getClientOriginalName();
               
        }

        if($user->update($data)){
            if(!empty($file)){
               $file->move('Admin/imageuser',$file->getClientOriginalName());
            }        
            return redirect()->back()->with('success', __('Update profile success. '));
        }else{
            return redirect()->back()->withErrors('Update profile error');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
