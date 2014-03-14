<?php

class Artikel extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'artikel';

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function tags(){
        return $this->hasMany('tags','post_id');
    }
}