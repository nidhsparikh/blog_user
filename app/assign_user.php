<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assign_user extends Model
{
    protected $table ='table_assignusers';
    protected $fillable = [
        'assign_admin','user_id',
    ];
    public function user()
    {
        return $this->belongsTo('App\User','id');
    }
}
