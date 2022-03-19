<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administrator;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\AdministratorsUpdate;
class AdministratorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $administrator = Administrator::paginate(20);

        return view('admin.administrators.index',['administrators' => $administrator ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){

        if(!(url()->full() == url()->previous())){
            $request->session()->put('preUrl',url()->previous());
        }
    
        return view('admin.administrators.create');
    }
    public function search(Request $request){
        if(strlen($request->loginid) > 0){
            $administrator = Administrator::where('account','like','%'.$request->loginid.'%')->paginate(20);
        }else{
            $administrator = Administrator::paginate(20);
        }

        return view('admin.administrators.index',['administrators' => $administrator ]);
    }
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,int $administratorId)
    {
        if(!$administratorId){
            return redirect()->route('administrators.index');
        }
        // dd(url()->full(),url()->previous());
        if(!(url()->full() == url()->previous())){
            $request->session()->put('preUrl',url()->previous());
        }
        $administrator = Administrator::find($administratorId);

        return view('admin.administrators.edit',['administrators' => $administrator ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdministratorsUpdate $request)
    {
        try {
           $administrator = ($request->administrators_id) ? Administrator::find($request->administrators_id) : new Administrator();
           $administrator->account = $request->account;
           // if( $request->password !== $request->password_confirm){
           //  return redirect()->back()->with('error',['mật khẩu không đúng']);
           // }
           if(isset($request->password) && strlen($request->password) > 0){
            $administrator->password = Hash::make($request->password);
           }
           // dd($administrator);
           $administrator->save();
        } catch (Exception $e) {
            // dd('sadasd');
            return redirect()->back()->with('error',['cập nhật không thành công']);
        }
        $request->session()->flash('message',['cập nhật']);
        return redirect()->route('administrators.index');
    }

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
     public function delete(Request $request)
    {
      
        if(Administrator::count() > 1){
            try {
                Administrator::find($request->administrators_id)->delete();
            } catch (Exception $e) {
                return redirect()->back()->with('error', ['Không xóa được']);
            }
            $request->session()->flash('Xoá thành công');
            return redirect()->route('administrators.index');
        }
    }
    
}
