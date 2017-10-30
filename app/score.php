<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class score extends Model
{
    protected $fillable = ['user_id', 'naam', 'email', 'kruipscore', 'gewonnengames'];


    public function user(){
        return $this->belongsTo('App\User');
    }


}
