<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    
      //
      use Notifiable;
      //name of table
      protected $table = 'contact';
  
      protected $fillable = 
      [  'id', 'contact_name', 'contact_email', 'contact_subject', 
      'contact_message', 'contact_view', 'contact_type' ];
}
