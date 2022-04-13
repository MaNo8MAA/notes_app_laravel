<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $date = ['deleted_at'];
    protected $fillable = ['content', 'type', 'photo', 'user_id'];

    public function user()
    {
        //   return $this->belongsTo('App\User', 'user_id');
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function user()
    // {
    //     return $this->hasMany(Note::class, 'user_id');
    // }
}
