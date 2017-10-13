<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class score extends Model
{
    protected $fillable = ['naam', 'email', 'kruipscore', 'gewonnengames'];
}
