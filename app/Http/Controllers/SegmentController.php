<?php

namespace App\Http\Controllers;

use App\Segment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SegmentController extends Controller
{
    protected $segment;
    protected $request;

    /**
     * SegmentController constructor.
     *
     * @param Request $request
     * @param Segment $segment
     */
    public function __construct(Request $request, Segment $segment)
    {
        $this->segment = $segment;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $response = $this->segment->all();
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
        $response = $this->segment->where('segment', '=', $this->request->segment)->firstOrFail();
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Segment $segment
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(segment $segment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Segment  $segment
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, segment $segment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Segment  $segment
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(segment $segment)
    {
        //
    }
}
