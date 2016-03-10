<?php

namespace Padawan\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table ="Invoices";

    protected $fillable = ["Date","N_Invoice","N_order","Contact","State","ExpirationDate","Amount","Balance"];
}
