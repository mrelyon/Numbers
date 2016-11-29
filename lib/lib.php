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
	var $odd;
	var $even;
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
		if(!self::checkValue() == true){
		   self::returnError($this->number. " is not a number");	
		} 
        # de assemble number for analysis
        # number type
        self::checkType();
        # number unit
        self::checkUnit();
		#
		$this->final_numbers = array();
		$this->final_numbers['number'] = $this->number;
		$this->final_numbers['type'] = $this->type;
		$this->final_numbers['power_ten'] = $this->power_ten;
		$this->final_numbers['engineering_notation'] = $this->engineering_notation;
		$this->final_numbers['short_scale'] = $this->short_scale;
		$this->final_numbers['long_scale'] = $this->long_scale;
		$this->final_numbers['si_symbol'] = $this->si_symbol;
		$this->final_numbers['si_prefix'] = $this->si_prefix;
		$this->final_numbers['odd'] = $this->odd;
		$this->final_numbers['even'] = $this->even;
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
	# type of number
	final function checkType(){
		if($this->number <= 10){
           $this->type = 'Natural Number';
        }else{
        	$this->type = 'NULL';
        }
	}
	#
	final function checkUnit(){
		#
		if(strlen($this->number) <= 1){
        	$this->power_ten = '10*P0';
        	$this->engineering_notation = '1';
        	$this->short_scale = 'One';
        	$this->long_scale = 'One';
        	$this->si_symbol = '';
        	$this->si_prefix = '';
        }else{
        	$this->power_ten = 'null';
        	$this->engineering_notation = 'null';
        	$this->short_scale = 'null';
        	$this->long_scale = 'null';
        	$this->si_symbol = 'null';
        	$this->si_prefix = 'null';
        }
	}
}

?>