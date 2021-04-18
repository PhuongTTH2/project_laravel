<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $data = [];
    protected $addUrl = '/product/add';
    protected $editUrl = '/product/edit';
    protected $listUrl = '/product/list';
    protected $viewUrl = '/product/view';
    protected $deleteUrl = '/product/delete';
    protected $producttRepository;
    public function __construct(ProductRepository $producttRepository)
    {
        $this->middleware('auth');
        $this->producttRepository = $producttRepository;
        $this->data['addUrl'] = url('/') . $this->addUrl;
        $this->data['listUrl'] = url('/') . $this->listUrl;
        $this->data['editUrl'] = url('/') . $this->editUrl;
        $this->data['viewUrl'] = url('/') . $this->viewUrl;
        $this->data['deleteUrl'] = url('/') . $this->deleteUrl;
    }

    public function index()
    {
//        $this->data['product'] = Product::all();
        $this->data['product'] =  $this->producttRepository->all();
        return view('product.list', $this->data);
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
    public function update(Request $request, $id)
    {
        //
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
}
