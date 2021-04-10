<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;
use App\Models\Todo;
use DB;
use Session;

class CrudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todo = Todo::all();
        return view('crud')->with(compact('todo'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        $todo = new Todo;
        $todo->title = $data['title'];
        $todo->description =  $data['description'];
        $todo->created_at = time();
        $todo->updated_at = time();
        DB::beginTransaction();
        try {
            $todo->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            // throw $e;
            // return Response::json([
            //     'status' => 'error',
            //     'message'=> 'error message'
            //   ]);
        }

        Session::flash('flash_message', 'Todo successfully add!');
        return Response::json($todo);
    }

    public function destroy($id)
    {
        $todo = Todo::findOrFail($id);

        $todo->delete();

        Session::flash('flash_message', 'Todo successfully deleted!');

        return redirect()->route('crud-name');
    }

    public function edit($id, Request $request)
    {
        $data = $request->validate([
          'title' => 'required|max:255',
          'description' => 'required'
      ]);
        $todo = Todo::find($id);
        $todo->title = $data['title'];
        $todo->description = $data['description'];
        $todo->update();
        Session::flash('flash_message', 'Todo successfully edit!');
        return  Response::json($todo);
    }
}


  // public function edit(Request $request, $id)
  //   {
  //       $name = $request->input('name');
  //       try {
  //            DB::table('academic')
  //                 ->where('id', $id)
  //                 ->update(['name' => $name]);
  //            echo "Record updated successfully.<br/>";
  //       }  catch (\Exception $ex) {
  //            dd($ex);
  //       }
  //   }
