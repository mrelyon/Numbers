<?php
/*
@author Ayomide Ikechukwu Daniels
@life.of.an.island on instagram
@ age2ho@gmail.com
@https://lifeofanisland.herokuapp.com
*/
namespace Lifeofanisland\Elyon\Lib;
#
class NumberController{
	#
	var $number;
	var $type;
	var $unit;
	var $power_ten;
	var $engineering_notation;
	var $short_scale;
	var $long_scale;
	var $si_symbol;
	var $si_prefix;
	var $final_numbers;
	var $numbers_out;
	#
	final function sortNumber($n){
		#
		$this->numbers_out = array();
		#
		foreach ($n as $key => $val) {
		#	
		$this->number = $val;
		#
		if(!NumberController::checkValue() == true){
		   NumberController::returnError($this->number. " is not a number");	
		} 
        # de assemble number for analysis
        # number type
        if($this->number <= 10){
           $this->type = 'Natural Number';
        }else{
        	$this->type = 'NULL';
        }
        # number unit
        if(strlen($this->number) <= 1){
        	$this->unit = 'One';
        }else{
        	$this->type = 'NULL';	
        }
		#
		$this->final_numbers = array();
		$this->final_numbers['number'] = $this->number;
		$this->final_numbers['type'] = $this->type;
		$this->final_numbers['unit'] = $this->unit;
		$this->numbers_out[] = $this->final_numbers;
		#
	    }
		return json_encode($this->numbers_out);

	}
	#
	final function checkValue(){
		#
		if (preg_match("/^[1-9][0-9]*$/", $this->number) || is_numeric($this->number)) {
			return true;
		}else{
			return false;
		}
	}
	#
	final function returnError($error){
		#
		die($error);
	}
}

?>