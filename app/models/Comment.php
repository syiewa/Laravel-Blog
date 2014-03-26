<?php

class Comment extends \Kalnoy\Nestedset\Node {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'komentar';
    protected $fillable = array('nama', 'url', 'email', 'komentar', 'parent_id');
    public static $rules = array(
        'nama' => 'required',
        'url' => 'url',
        'email' => 'required|email',
        'komentar' => 'required|min:5'
    );

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function artikel() {
        return $this->belongsTo('Artikel', 'post_id');
    }

}