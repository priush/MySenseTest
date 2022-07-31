<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
  
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'employees';
    protected $fillable = array(
        'empid',
        'emp_name',
        'emp_designation',
        'emp_date_of_join',
        'emp_gender',
        'emp_address',
        'created_date',
        'updated_date'
    );

    public $timestamps = false;
}
