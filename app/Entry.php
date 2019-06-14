<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(App\User::class);
        // Строку следует читать так:
        // «Эта сущность (товар) относится к одному производителю;
        // вернуть этого производителя

        // То же самое можно было бы записать иначе:
        // $this->belongsTo('App\Manufacturer');
    }

}


