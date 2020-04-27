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
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $seg = new $this->segment;
        $seg->segment = $this->request->segment;
        $seg->segment_name = $this->request->segment_name;

        try {
            if ($seg->save()) {
                return response()->json(['message' => 'success'],201);
            };
        } catch (\Exception $exception) {
            return response()->json([
                "message" => "not created",
                "error" => $exception->getMessage()
            ], 400);
        }
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
     * @return JsonResponse
     */
    public function update()
    {
        $seg = $this->segment->where('segment', '=', $this->request->segment)->firstOrFail();
        (!empty(trim($this->request->segment_name)) ? $seg->segment_name = (trim($this->request->segment_name)) : null);
        try {
            if ($seg->save()) {
                return response()->json(['message' => 'updated'], 200);
            }
        } catch (\Exception $exception) {
            return response()->json([
                "message" => "not updated",
                "error" => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return JsonResponse
     */
    public function destroy()
    {
        $seg = $this->segment->where('segment', '=', $this->request->segment)->firstOrFail();
        try {
            if ($seg->delete()) {
                return response()->json(['message' => 'deleted'], 200);
            };
        } catch (\Exception $exception) {
            return response()->json([
                "message" => "not deleted",
                "error" => $exception->getMessage()
            ], 400);
        }
    }
}
