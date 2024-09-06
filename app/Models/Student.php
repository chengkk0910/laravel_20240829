<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;

    public function phoneRelation(): HasOne
    {
        return $this->hasOne(Phone::class);
    }

    // 重點 多 要用複數
    public function hobbiesRelation(): HasMany
    {
        return $this->hasMany(Hobby::class);
    }
}
