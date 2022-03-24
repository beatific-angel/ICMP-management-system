<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'servicestatus';

    protected $primaryKey = 'id';

    protected $fillable = ['deviceid','devicename','groupid','ipaddress','status','created_at','updated_at'];
}
