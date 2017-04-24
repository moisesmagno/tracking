<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class URLResult extends Model
{

    use SoftDeletes;

    protected $table = 'url_results';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_url', 'referer', 'agent', 'remote_addr'
    ];

    protected $dates = ['deleted_at'];
    
    protected $softDelete = true;

}
