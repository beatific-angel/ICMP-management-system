<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'servicestatus';

    protected $primaryKey = 'id';

    protected $fillable = ['deviceid','devicename','groupid','ipaddress','status','access_count','up_count','down_count','created_at','updated_at'];
}
