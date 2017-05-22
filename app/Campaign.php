<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{

    use SoftDeletes;

    protected $table = 'campaigns';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_mark', 'id_pixel', 'name'
    ];

    protected $dates = ['deleted_at', 'created_at'];
    
    protected $softDelete = true;

    public function getPixels(){
        return $this->hasMany(PixelConversion::class,'id','id_pixel');
    }
}
