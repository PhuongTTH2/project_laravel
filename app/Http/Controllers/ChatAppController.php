<?php

namespace App\Http\Controllers;

use App\Models\ChatApp;
use App\Models\User;
use Illuminate\Http\Request;
use Response;

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
}
