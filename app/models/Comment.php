<?php

class Comment extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'komentar';

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function artikel(){
        return $this->belongsTo('artikel','post_id');
    }

}