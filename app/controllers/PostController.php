<?php

class PostController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    protected $stat = array(
        '0' => 'inactive',
        '1' => 'active'
    );

    public function index() {
        $this->data['stat'] = $this->stat;
        $this->data['artikel'] = Artikel::orderBy('tgl', 'desc')->paginate(5);
        return View::make('posts.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        return View::make('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
        $input = Input::all();
        var_dump($input);
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
        $this->data['artikel'] = Artikel::find($id);
        $this->data['tags'] = Artikel::find($id)->tags()->get();
        return View::make('posts.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
        $input = Input::all();
        $tags = explode(",", $input['tags']);
        $destinationPath = public_path() . '/assets/image';
        if (Input::hasFile('gambar')) {
            Input::file('gambar')->move($destinationPath);
            $input['gambar'] = Input::file('gambar')->getClientOriginalName();
        }
        $artikel = Artikel::find($id);
        $update = $artikel->update($input);
        if ($update) {
            $deltags = $artikel->tags()->delete();
            foreach ($tags as $t) {
                $new_tags = new Tags(array('nama' => $t, 'slug' => $t));
                $artikel->tags()->save($new_tags);
            }
        }
        return Redirect::route('artikel.index');
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
