<?php

class SysError{
	private $errors = array();

	function setError($errorCode){
		$this->errors[] = $errorCode;
	}

	function getErrors(){
		return $this->errors;
	}

	function haveErrors(){
		return (count($this->errors) > 0) ? true : false;
	}


}