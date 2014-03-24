<?php

class Artikel extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'artikel';
    protected $fillable = array('judul', 'isi', 'status', 'gambar', 'tgl', 'pubdate','slug');
    public $timestamps = false;
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
    public function scopeLive($query) {
        return $query->where($this->getTable() . '.status', '1')
                        ->where($this->getTable() . '.pubdate', '<=', date('Y-m-d h:i:s'));
        $queries = DB::getQueryLog();
        $last_query = end($queries);
        var_dump($last_query);
    }

    public function scopeByYearMonth($query, $year, $month) {
        return $query->where(\DB::raw('DATE_FORMAT(pubdate, "%Y%m")'), '=', $year . $month);
    }

    public static function archives() {
// Get the data
        $archives = self::live()
                ->select(\DB::raw('
                YEAR(`pubdate`) AS `year`,
                MONTH(`pubdate`) AS `month`,
                MONTHNAME(`pubdate`) AS `monthname`,
                COUNT(*) AS `count`
                '))
                ->groupBy(\DB::raw('DATE_FORMAT(`pubdate`, "%Y%m")'))
                ->orderBy('pubdate', 'desc')
                ->get();

// Convert it to a nicely formatted array so we can easily render the view
        $results = array();
        foreach ($archives as $archive) {
            $results[$archive->year][$archive->month] = array(
                'monthname' => $archive->monthname,
                'count' => $archive->count,
            );
        }
        return $results;
    }

    public function tags() {
        return $this->hasMany('tags', 'post_id');
    }

    public function comment() {
        return $this->hasMany('comment', 'post_id');
    }

}
