<?php
/**
 * Created by PhpStorm.
 * User: tonnes
 * Date: 6/23/20
 * Time: 7:33 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $table = 'leads';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'message'
    ];

}
