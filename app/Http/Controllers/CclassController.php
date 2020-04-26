<?php

namespace App\Http\Controllers;

use App\Cclass;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CclassController extends Controller
{
    protected $class;
    protected $request;

    public function __construct(Request $request, Cclass $class)
    {
        $this->class = $class;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $response = $this->class->all();
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
        $cla = new $this->class;
        $cla->class = $this->request->class;
        $cla->class_name = $this->request->class_name;

        try {
            if ($cla->save()) {
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
     * Display the specified resources
     *
     * @return JsonResponse
     */
    public function show()
    {
        $response = $this->class->where('class', '=', $this->request->class)->firstOrFail();
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cclass  $cclass
     * @return \Illuminate\Http\Response
     */
    public function edit(cclass $cclass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request      $request
     * @param  \App\cclass $cclass
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cclass $cclass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cclass  $cclass
     * @return \Illuminate\Http\Response
     */
    public function destroy(cclass $cclass)
    {
        //
    }
}
