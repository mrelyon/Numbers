<?php
/*
@author Ayomide Ikechukwu Daniels
@life.of.an.island on instagram
@ age2ho@gmail.com
@https://lifeofanisland.herokuapp.com
*/
class Index{
	#
	static function setLib(){
		#
		require 'lib.php';
	}
}

spl_autoload_register("Index::setLib");

?>