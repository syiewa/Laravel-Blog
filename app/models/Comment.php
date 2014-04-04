<?php

class Comment extends Baum\Node {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'komentar';
    protected $fillable = array('nama', 'url', 'email', 'komentar');
    protected $parentColumn = 'parent_id';
    // 'lft' column name
    protected $leftColumn = 'lft';
    // 'rgt' column name
    protected $rightColumn = 'rgt';
    // 'depth' column name
    protected $depthColumn = 'depth';
    // guard attributes from mass-assignment
    protected $guarded = array('id', 'parent_id', 'lft', 'rgt', 'depth');
    public static $rules = array(
        'nama' => 'required',
        'url' => 'url',
        'email' => 'required|email',
        'komentar' => 'required|min:5',
        'recaptcha_response_field' => 'required|recaptcha',
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
