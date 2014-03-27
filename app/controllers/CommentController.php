<?php

class CommentController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
        $this->data['comments'] = Comment::with('artikel')->orderBy('created_at', 'desc')->select('komentar.*')->paginate(5);
        return View::make('admin.comments.index', $this->data);
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
        if (!Sentry::check()) {
            $input = Input::except('slug', 'parent_id');
            $validation = Validator::make($input, Comment::$rules);
            if ($validation->fails()) {
                return Redirect::to('artikel/' . Input::get('slug'))->withInput($input)->withErrors($validation);
            }
            $telo = new Comment();
            $telo->fill($input);
            $post = Artikel::find(Input::get('post_id'));
            $telo->artikel()->associate($post);
            if ($telo->save()) {
                $root = Comment::find(Input::get('parent_id'));
                $telo->makeChildOf($root);
                return Redirect::to('artikel/' . Input::get('slug'));
            }
        } else {
            $user = Sentry::getUser();
            $input = array(
                'nama' => ucfirst($user->first_name) . ' ' . ucfirst($user->last_name),
                'url' => 'arnosa.net',
                'email' => $user->email,
                'komentar' => strip_tags(Input::get('komentar')),
            );
        }
        $com = new Comment();
        $com->fill($input);
        $post = Artikel::find(Input::get('post_id'));
        $com->artikel()->associate($post);
        if ($com->save()) {
            if (Input::get('parent_id')) {
                $root = Comment::find(Input::get('parent_id'));
                $com->makeChildOf($root);
            }
            return Redirect::route('admin.comments.index');
        }
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