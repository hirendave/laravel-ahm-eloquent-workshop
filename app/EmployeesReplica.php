<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeesReplica extends Model
{
	protected $connection= 'mysqlreplica';
	
    protected $table='employees';

    protected $with = ['project'];
}
