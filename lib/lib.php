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
		$num_nature = new SortNumberNatureController();
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
        $num_nature->checkType();
        # number unit
        $num_nature->checkUnit();
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
}


	class SortNumberNatureController extends NumberController{
	# type of number
	final function checkType(){
		if($this->number <= 10 && strpos($this->number, ".") == false){
           $this->type = 'Natural Number';
        }elseif($this->number > 10 && $this->number <= 1000000000000000000 && strpos($this->number, ".") == false) {
        	$this->type = 'Whole Number';
        	  
        }else{
        	$this->type = 'null';
        }
	}
	#
	final function checkUnit(){
		#
		if(strlen($this->number) == 1 && strpos($this->number, ".") == false){
        	$this->power_ten = '10 p 0';
        	$this->engineering_notation = '1';
        	$this->short_scale = 'One';
        	$this->long_scale = 'One';
        	$this->si_symbol = '';
        	$this->si_prefix = '';
        }elseif(strlen($this->number) == 2 && strpos($this->number, ".") == false){
            $this->power_ten = '10 p -1';
        	$this->engineering_notation = '100 x 10 p -3 ';
        	$this->short_scale = 'Tenth';
        	$this->long_scale = 'Tenth';
        	$this->si_symbol = 'd';
        	$this->si_prefix = 'deci-';	
        }elseif(strlen($this->number) == 3 && strpos($this->number, ".") == false){
            $this->power_ten = '10 p -2';
        	$this->engineering_notation = '10 x 10 p -3 ';
        	$this->short_scale = 'Hundredth';
        	$this->long_scale = 'Hundredth';
        	$this->si_symbol = 'c';
        	$this->si_prefix = 'centi-';	
        }elseif(strlen($this->number) == 4 && strpos($this->number, ".") == false){
            $this->power_ten = '10 p -3';
        	$this->engineering_notation = '1 x 10 p -3 ';
        	$this->short_scale = 'Thousandth';
        	$this->long_scale = 'Thousandth';
        	$this->si_symbol = 'm';
        	$this->si_prefix = 'milli-';	
        }elseif(strlen($this->number) == 5 && strpos($this->number, ".") == false){
            $this->power_ten = '10 p -4';
        	$this->engineering_notation = '100 x 10 p -6 ';
        	$this->short_scale = 'Ten Thousandth';
        	$this->long_scale = 'Ten Thousandth';
        	$this->si_symbol = '';
        	$this->si_prefix = '';	
        }elseif(strlen($this->number) == 6 && strpos($this->number, ".") == false){
            $this->power_ten = '10 p -5';
        	$this->engineering_notation = '10 x 10 p -6 ';
        	$this->short_scale = 'Hundred Thousandth';
        	$this->long_scale = 'Hundred Thousandth';
        	$this->si_symbol = '';
        	$this->si_prefix = '';
        }elseif(strlen($this->number) == 7 && strpos($this->number, ".") == false){
            $this->power_ten = '10 p -6';
        	$this->engineering_notation = '1 x 10 p -6 ';
        	$this->short_scale = 'Millionth';
        	$this->long_scale = 'Millionth';
        	$this->si_symbol = 'u';
        	$this->si_prefix = 'micro-';							
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