<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mark extends Model
{
    protected $table = 'marks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'name'
    ];

    protected $dates = ['deleted_at', 'created_at'];

    protected $softDelete = true;

    public function getCampaigns(){
        return $this->hasMany(Campaign::class, 'id_mark', 'id');
    }
}
