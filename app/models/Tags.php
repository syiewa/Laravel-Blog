<?php

class Tags extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags';
    protected $primaryKey = 'tag_id';

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function artikel(){
        return $this->belongsTo('artikel','post_id');
    }
}