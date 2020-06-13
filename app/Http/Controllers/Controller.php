<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Employees;
use App\Projects;
use App\EmployeesReplica;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function cloneModelDemo(){
    	$user = Employees::find(1);
		$newUser = $user->replicate();
		$newUser->save();
		echo "Model cloned, Check in Database.";
    }

    function incrementValueDemo(){
    	//Employees::find(1)->increment('casual_leave');
    	//echo "Added one more leave count. Check in Database.";

		//Employees::find(1)->increment('casual_leave',3);
		//echo "Added one more leave count. Check in Database.";
		
		Employees::find(1)->decrement('casual_leave');
		echo "Reduced one more leave count. Check in Database.";
    }

    function isDirtyDemo(){
    	$user = Employees::find(1);
    	if(!$user->isDirty()){
    		echo "Value is not changed<br/>";
    	}
    	//value changed 
    	$user->name = "Hiren Dave";
    	if($user->isDirty()){
    		echo "Value is changed<br/>";
    	}
    }

    function getOriginalDemo(){
    	$user = Employees::find(1);
    	echo "Current name is ".$user->name."<br/>";

    	//value changed 
    	$user->name = "Hiren Dave";
    	echo "Changed name is ".$user->name."<br/>";

    	//original
    	echo "Original name was ".$user->getOriginal('name')."<br/>";
    }

    function getChangesDemo(){
    	$user = Employees::find(1);

    	//value changed 
    	$user->name = "Hiren Dave";
    	$user->designation = "Senior Programmer";
    	$user->save(); 
    	print_r($user->getChanges());
    }

    function accessorsDemo(){
    	$user = Employees::find(1);
    	echo $user->title;
    }

    function mutatorsDemo(){
    	$user = Employees::find(1);
    	$user->monthly_casual_leave = 1;
    	$user->save();
    	echo $user->casual_leave;
    }

    function eagerLoadingDemo(){
    	$employees = Employees::with('project')->get();
		foreach ($employees as $employee) {
    		foreach($employee->project as $key=>$value){
    			echo $value->name."<br/>";
    		}
		}
    }

    function modelKeysDemo(){
    	//print_r(Employees::all()->pluck('id')->toArray());
    	print_r(Employees::all()->modelKeys());
    }

    function newQueryDemo(){
    	foreach(Employees::all() as $employee){
    		echo $employee->name."<br/>";
    	}
    }

    function replicaDemo(){
    	$user = new Employees();
    	$user->name = "Hiren Replica";
    	$user->designation = "Programmer";
    	$user->doj = "01-01-2020";
    	$user->casual_leave = "1";
    	$user->save();
    }
}
