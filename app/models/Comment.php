<?php

class Comment extends \Kalnoy\Nestedset\Node {

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