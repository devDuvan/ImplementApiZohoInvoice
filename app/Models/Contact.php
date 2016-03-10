<?php

namespace Padawan\Models;

use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{
    protected $table ="Contacts";
    protected $fillable = ["CompanyName","Name","Email","Tel","Cel","Website"];
}
