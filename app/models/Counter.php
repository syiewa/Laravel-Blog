<?php

class Counter extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'counter';
    protected $fillable = array('ip');

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function posts() {
        return $this->belongsTo('Artikel', 'post_id');
    }

}