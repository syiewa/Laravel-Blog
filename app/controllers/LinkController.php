<?php

class LinkController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct() {
        parent::__construct();
        View::share('active', 'links');
    }

    public function index(){
        $this->data['links']  = Links::all();
        return View::make('admin.links.index',  $this->data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        return View::make('admin.links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
        $rules = array(
            'judul' => 'required',
            'url' => 'required|url'
        );
        $input = Input::get();
        $validation = Validator::make($input, $rules);
        if ($validation->passes()) {
            return Redirect::route('admin.links');
        }
        return Redirect::route('admin.links.create')
                        ->withInput()
                        ->withErrors($validation);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
