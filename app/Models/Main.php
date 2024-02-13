<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

trait Main
{
    public function scopeActive($query)
    {
        return $query->where('status', '1');
    }

    public function storeImage($image, $path)
    {
        $ext = $image->getClientOriginalExtension();
        $image_name = 'picture' . rand() . '.' . $ext;
        $image->move($path, $image_name);
        return $image_name;
    }
}
