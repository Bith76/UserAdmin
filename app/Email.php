<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    /** The name of the table */
    protected $table = 'email';

    /** No creation timestamps in table */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'email',
    ];
}
