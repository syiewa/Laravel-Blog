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

    public function __construct(Artikel $Post) {
        parent::__construct();
        $this->post = $Post;
        $this->data['arsip'] = $this->post->archives();
        $this->data['links'] = Links::all();
        $this->data['telo'] = Tags::groupBy('slug')->get();
        View::share('active', 'article');
    }

    public function home() {
        $this->data['artikel'] = $this->post->live()->orderBy('pubdate', 'desc')->paginate(5);
        $this->data['artikel']->setBaseUrl('/telo2/blog-laravel/');
        return View::make('front.index', $this->data)->nest('sidebar', 'front.layouts.sidebar', $this->data)->nest('footer', 'front.layouts.footer', $this->data);
    }

    public function index() {

        $this->data['stat'] = $this->stat;
        $this->data['artikel'] = Artikel::orderBy('tgl', 'desc')->paginate(5);
        return View::make('admin.posts.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
        return View::make('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
        $destinationPath = public_path() . '/assets/image';
        $input = Input::except('tags');
        $tags = Input::only('tags');
        $artikel = new Artikel;
        $artikel->judul = $input['judul'];
        $artikel->isi = $input['isi'];
        $artikel->pubdate = date('Y-m-d h:i:s', strtotime($input['pubdate']));
        $artikel->status = $input['status'];
        $artikel->tgl = date('Y-m-d h:i:s');
        $artikel->slug = getSlug($input['judul']);
        if (Input::hasFile('gambar')) {
            Input::file('gambar')->move($destinationPath);
            $artikel->gambar = Input::file('gambar')->getClientOriginalName();
        }
        $validation = Validator::make($input, Artikel::$rules);
        if ($validation->passes()) {
            if ($artikel->save($input)) {
                foreach (explode(",", $tags['tags']) as $t) {
                    $new_tags = new Tags(array('nama' => $t, 'slug' => truncate($t)));
                    Artikel::find($artikel->id)->tags()->save($new_tags);
                }
            }
            return Redirect::route('admin.artikel.index');
        }
        return Redirect::route('admin.artikel.create')
                        ->withInput()
                        ->withErrors($validation);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Artikel $slug) {
        //
        $this->data['art'] = $slug;
        if (is_null($this->data['art']))
            return Event::first('404');
        return View::make('front.show', $this->data)->nest('sidebar', 'front.layouts.sidebar', $this->data)->nest('footer', 'front.layouts.footer', $this->data);
    }

    public function tags_show($telo) {
        $this->data['artikel'] = Tags::Hmm($telo)->paginate(5);
        return View::make('front.tags', $this->data)->nest('sidebar', 'front.layouts.sidebar', $this->data)->nest('footer', 'front.layouts.footer', $this->data);
        ;
    }

    public function archives($year, $month = null) {
        $this->data['artikel'] = $year->paginate(5);

        if ($month != null) {
            $this->data['artikel'] = $month->paginate(5);
        }
        return View::make('front.index', $this->data)->nest('sidebar', 'front.layouts.sidebar', $this->data)->nest('footer', 'front.layouts.footer', $this->data);
        ;
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
        return View::make('admin.posts.edit', $this->data);
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
        $input['pubdate'] = date('Y-m-d h:i:s', strtotime(Input::get('pubdate')));
        $input['slug'] = getSlug(Input::get('judul'));
        $tags = explode(",", $input['tags']);
        $destinationPath = public_path() . '/assets/image';
        if (Input::hasFile('gambar')) {
            Input::file('gambar')->move($destinationPath);
            $input['gambar'] = Input::file('gambar')->getClientOriginalName();
        }
        $artikel = Artikel::find($id);
        $validation = Validator::make($input, Artikel::$rules);
        if ($validation->passes()) {
            $update = $artikel->update($input);
            if ($update) {
                $deltags = $artikel->tags()->delete();
                foreach ($tags as $t) {
                    $new_tags = new Tags(array('nama' => $t, 'slug' => truncate($t)));
                    $artikel->tags()->save($new_tags);
                }
            }
            return Redirect::route('admin.artikel.index');
        }
        return Redirect::route('admin.artikel.edit', $id)
                        ->withInput()
                        ->withErrors($validation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
        $artikel = Artikel::find($id);
        if ($artikel->delete()) {
            $artikel->tags()->delete();
        }
        return Redirect::route('admin.artikel.index');
    }

}
