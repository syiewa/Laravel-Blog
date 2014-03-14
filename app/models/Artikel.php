<?php

class Artikel extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'artikel';
    protected $fillable = array('judul', 'isi', 'status','gambar');
    public $timestamps = false;
    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function tags(){
        return $this->hasMany('tags','post_id');
    }
}