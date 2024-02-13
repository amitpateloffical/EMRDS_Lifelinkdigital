<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreEmployment extends Model
{
    use HasFactory;
    use Main;

    public static function generateparentId()
    {
        do {
            $random_number = rand(0, 9999999);
            $code = str_pad($random_number, 7, '0', STR_PAD_LEFT);
            $exists = Self::where('parent', $code)->exists();
        } while ($exists);

        return $code;
    }

}
