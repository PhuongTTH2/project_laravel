<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ChatApp;
use App\Models\User;
use Response;
use DB;
use Session;
class ChatAppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $data = [];
    protected $chatUrl = '/chatapp';

    public function __construct()
    {
        $this->middleware('auth');
        $this->model = new User();
        $id = Auth::id();
        $this->data['chatUrl'] = url('/') . $this->chatUrl;

    }

    public function index()
    {
        $this->data['chatapp'] = ChatApp::all();
        $this->data['user'] = User::all();
        return view('chatapp.chat', $this->data);
    }

    public function search(Request $request)
    {
        $chatapp = $this->model->where('name', 'LIKE', "%{$request['name']}%")->get();
        return $chatapp;
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
     * @param  \App\Models\ChatApp  $chatApp
     * @return \Illuminate\Http\Response
     */
    public function show(ChatApp $chatApp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChatApp  $chatApp
     * @return \Illuminate\Http\Response
     */
    public function edit(ChatApp $chatApp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChatApp  $chatApp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChatApp $chatApp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChatApp  $chatApp
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChatApp $chatApp)
    {
        //
    }

    public function chatBox(Request $request)
    {
        $id = $request['id'];
        $todo = User::find($id);
       return $todo ;
    }

    function addMessages(Request $request){
        $id = Auth::user()->id;

        $request = $request->validate([
            'id' => 'required|max:255',
            'msg' => 'required'
        ]);
        $id_chat = $request['id'];
        $messages = $request['msg'];

        $chat = new ChatApp;
        $chat->from_user = $id_chat;
        $chat->to_user = $id;
        $chat->outgoing_msg_id = 99;
        $chat->incoming_msg_id = 99;
        $chat->msg = $messages;
        $chat->created_at = time();
        $chat->updated_at = time();
        $chat->save();
//        DB::beginTransaction();
//        try {
//            $chat->save();
//            DB::commit();
//        } catch (Exception $e) {
//            DB::rollBack();
//            // throw $e;
//            // return Response::json([
//            //     'status' => 'error',
//            //     'message'=> 'error message'
//            //   ]);
//        }

        return $messages;
    }
    public function getLoadLatestMessages(Request $request)
    {
        if(!$request->user_id) {
            return;
        }
        $messages = ChatApp::where(function($query) use ($request) {
            $query->where('from_user', Auth::user()->id)->where('to_user', $request->user_id);
        })->orWhere(function ($query) use ($request) {
            $query->where('from_user', $request->user_id)->where('to_user', Auth::user()->id);
        })->orderBy('created_at', 'ASC')->limit(10)->get();
        $return = [];
        foreach ($messages as $message) {
            $return[] = view('message-line')->with('message', $message)->render();
        }
        return response()->json(['state' => 1, 'messages' => $return]);
    }


}
