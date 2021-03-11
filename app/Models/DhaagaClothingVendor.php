<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DhaagaClothingVendor extends Model
{
    public function dhaagaClothingOders()
    {
        return $this->hasMany('App\Models\DhaagaClothingOrder');
    }
}
