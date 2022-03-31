<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $table = 'tickets';

    protected $primaryKey = 'id';

    protected $fillable = ['customer_id','ticket_id','title','priority','device_id','message','status','created_at','updated_at'];
}
