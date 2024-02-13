<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    public static function id()
    {
        $currentNumber = Self::latest()->value("number");
        $newNumber = $currentNumber == 0 ? 1 : $currentNumber + 1;
        $new = new Record();
        $new->number = $newNumber;
        $new->save();
        return $newNumber;
    }
}
