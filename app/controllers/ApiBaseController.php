<?php

use Services\ABaseService;

class ApiBaseController extends Controller {

	protected $modelService;

    public function __construct(ABaseService $modelService)
    {
        $this->modelService = $modelService;
    }

	/**
    * Display a listing of the resource.
    *
    * @return Response
    */
    public function index()
    {   
        $response = $this->modelService->getAll();

    	return $response;
    }

     /**
    * Display the specified resource.
    *
    * @param Event $id
    * @return Response
    */
    public function show($id)
    {
        $response = $this->modelService->getBy($id);

        return  $response;
        
    }

    /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
    public function store()  
    {

        $input = Input::all();

        $response = $this->modelService->create($input);

        return  $response;
    }


    /**
    * Update the specified resource in storage.
    *
    * @param Event $id
    * @return Response
    */
    public function update($id)
    { 
        $input = Input::all();

        $response = $this->modelService->update($id, $input);

        return  $response;
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param Event $id
    * @return Response
    */
    public function destroy($id)
    {
        $response = $this->modelService->delete($id);

        return  $response;
    }

}