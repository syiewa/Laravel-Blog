<?php

class Links extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'link';
    protected $fillable = array('judul','url','type');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */

}