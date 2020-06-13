<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table='employees';

    protected $with = ['project'];

    function getTitleAttribute() {
        return sprintf('%s The %s', $this->name, $this->designation);
    }

    public function setMonthlyCasualLeaveAttribute($value)
    {
        $this->attributes['casual_leave'] = $value * 12;
    }

    public function project()
    {
        return $this->hasMany('App\Projects','employee_id','id');
    }

    public function newQuery($excludeDeleted = true) {
		return parent::newQuery($excludeDeleted)
            ->whereRaw('(approve = ?)', array(1));
    }
}
