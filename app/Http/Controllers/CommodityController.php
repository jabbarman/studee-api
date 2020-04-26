<?php

namespace App\Http\Controllers;

use App\Commodity;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommodityController extends Controller
{
    protected $commodity;
    protected $request;

    /**
     * CommodityController constructor.
     *
     * @param Request   $request
     * @param Commodity $commodity
     */
    public function __construct(Request $request, Commodity $commodity)
    {
        $this->commodity = $commodity;
        $this->request = $request;
    }
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $response = $this->commodity->all();
        return response()->json($response, 200);
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
     * @return JsonResponse
     */
    public function show()
    {
        $response = $this->commodity->where('commodity', '=', $this->request->commodity)->firstOrFail();
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function edit(commodity $commodity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, commodity $commodity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\commodity  $commodity
     * @return \Illuminate\Http\Response
     */
    public function destroy(commodity $commodity)
    {
        //
    }
}
