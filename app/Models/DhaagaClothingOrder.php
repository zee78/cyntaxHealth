<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DhaagaClothingOrder extends Model
{
    public function dhaagaClothingVendor()
    {
        return $this->belongsTo('App\Models\DhaagaClothingVendor');
    }
}
