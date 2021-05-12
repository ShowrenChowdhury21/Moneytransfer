<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Transaction extends Model
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'sender',
        'amount',
        'reference',
        'bankname',
        'accounttype',
        'accountname',
        'accountno',
        'ifsccode'
    ];

    public $incrementing = false;
}
