<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttributesRequest;
use App\Models\Attributes;
use App\Service\AttributesService;
use Illuminate\Http\Request;

class AttributesController extends Controller
{
    private $attributesService;
    public function __construct( AttributesService $attributesService ){
        $this->attributesService = $attributesService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->attributesService->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.attributes.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AttributesRequest $request)
    {

        return $this->attributesService->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Attributes $attributes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        return $this->attributesService->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AttributesRequest $request)
    {
        return $this->attributesService->update($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->attributesService->destroy($id);
    }
}
