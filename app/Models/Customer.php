<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';

    protected $primaryKey = 'id';

    protected $fillable = ['first_name','last_name','short_name','email','phone','address','city','state','postcode','created_at','updated_at'];
}
