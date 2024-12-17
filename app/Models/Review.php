<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    // use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'note',
        'rating',
        'id_menu',
        'id_user',
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id', 'id_menu');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id_user');
    }
}
