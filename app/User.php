<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /** The name of the table */
    protected $table = 'user';

    /** No creation timestamps in table */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'dob',
    ];

    /**
     * Relation with the Email model.
     */
    public function email()
    {
        return $this->hasMany('App\Email');
    }
}
