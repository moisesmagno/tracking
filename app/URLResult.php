<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class URLResult extends Model
{

    protected $table = 'url_results';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_url', 'referer', 'agent', 'remote_addr'
    ];

    protected $softDelete = true;

}
