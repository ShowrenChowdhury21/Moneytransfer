<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class CustomerMessage extends Model
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sender',
        'subject',
        'message',
        'attachments'
    ];

    public function setFilenamesAttribute($value)
    {
        $this->attributes['attachments'] = json_encode($value);
    }
}
