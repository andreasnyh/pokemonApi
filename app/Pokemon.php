<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    protected $table = 'pokemon';

    protected
        $id,
        $name,
        $base_experience,
        $height,
        $is_default,
        $order,
        $weight;
}
