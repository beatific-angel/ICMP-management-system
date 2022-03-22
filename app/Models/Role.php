<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Role extends Authenticatable
{
    use HasFactory;

    protected $table = 'user_role';

    protected $primaryKey = 'id';

    protected $fillable = ['id','role_name','role_description','created_at','updated_at'];


}
