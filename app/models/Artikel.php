<?php

class Artikel extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'artikel';
    protected $fillable = array('judul', 'isi', 'status', 'gambar', 'tgl', 'pubdate');
    public $timestamps = false;
    public static $rules = array(
        'judul' => 'required|min:5',
        'isi' => 'required|min:5',
        'pubdate' => 'required|date',
        'gambar' => 'image'
    );

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function tags() {
        return $this->hasMany('tags', 'post_id');
    }

    public function comment() {
        return $this->hasMany('comment', 'post_id');
    }

}
