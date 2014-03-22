<?php

class CommentController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
        $this->data['comments'] = Comment::with('artikel')->orderBy('id', 'desc')->select('komentar.*')->paginate(5);
        return View::make('comments.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
        $input = Input::all();
        var_dump($input);die();
        $data = array(
            'nama' => 'test',
            'url' => 'test.com',
            'email' => 'test@tes.com',
            'komentar' => 'telo',
            'parent_id' => '13'
        );
        $com = new Comment();
        $com->fill($data);
        $post = Artikel::find(15);
        $com->artikel()->associate($post);
        $com->save();
        $queries = DB::getQueryLog();
        $last_query = end($queries);
        var_dump($last_query);
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
        $artikel = Comment::find($id);
        $artikel->delete();
        return Redirect::route('admin.comments.index');
    }

}