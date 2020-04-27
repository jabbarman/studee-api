<?php

namespace App\Http\Controllers;

use App\Family;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    protected $family;
    protected $request;

    /**
     * FamilyController constructor.
     *
     * @param Request $request
     * @param Family  $family
     */
    public function __construct(Request $request, Family $family)
    {
        $this->family = $family;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $response = $this->family->all();
        return response()->json($response, 200);
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
        $fam = new $this->family;
        $fam->family = $this->request->family;
        $fam->family_name = $this->request->family_name;

        try {
            if ($fam->save()) {
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
        $response = $this->family->where('family', '=', $this->request->family)->firstOrFail();
        return response()->json($response, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request      $request
     * @param  \App\family $family
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, family $family)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\family  $family
     * @return \Illuminate\Http\Response
     */
    public function destroy(family $family)
    {
        //
    }
}
