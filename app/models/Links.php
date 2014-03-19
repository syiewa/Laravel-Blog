<?php

class Links extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'link';
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

}