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
            $input = Input::except('slug');
            $validation = Validator::make($input, Comment::$rules);
            if ($validation->fails()) {
                return Redirect::to('artikel/' . Input::get('slug'))->withInput($input)->withErrors($validation);
            }
            $input['parent_id'] = 0;
            $telo = new Comment();
            $telo->nama = $input['nama'];
            $telo->url = $input['url'];
            $telo->email = $input['email'];
            $telo->komentar = strip_tags($input['komentar']);
            $post = Artikel::find(Input::get('post_id'));
            $telo->artikel()->associate($post);
            if ($telo->save()) {
                return Redirect::to('artikel/' . Input::get('slug'));
            }
        } else {
            $user = Sentry::getUser();
            $input = array(
                'nama' => ucfirst($user->first_name) . ' ' . ucfirst($user->last_name),
                'url' => 'arnosa.net',
                'email' => $user->email,
                'komentar' => strip_tags(Input::get('komentar')),
                'parent_id' => Input::get('parent_id'),
            );
        }
        $com = new Comment();
        $com->fill($input);
        $post = Artikel::find(Input::get('post_id'));
        $com->artikel()->associate($post);
        if ($com->save()) {
            Redirect::route('admin.comments.index');
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
