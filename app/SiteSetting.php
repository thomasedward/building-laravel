<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class SiteSetting extends Model
{
    use Notifiable;
    //name of table
    protected $table = 'sitesetting';

    protected $fillable = [ 'slug', 'nameSetting', 'value', 'type' ];
}
