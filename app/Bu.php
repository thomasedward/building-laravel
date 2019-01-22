<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Bu extends Model
{
    //
    use Notifiable;
    //name of table
    protected $table = 'bu';

    protected $fillable = 
    [  'bu_name', 'bu_price', 'bu_rent', 'bu_square', 
       'bu_type','bu_rooms', 'bu_small_dis', 'bu_large_dis', 'bu_meta',
        'bu_langtude', 'bu_latitude','bu_place', 'bu_image','bu_status', 
        'bu_month','user_id' ];
}
