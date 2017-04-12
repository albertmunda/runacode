<?php
#running external process
class ExecuteCode {

	private $input;
	private $output;
	public $python = '"C:\Users\Albert Mundu\Anaconda3\python.exe"';
	private $return;

	public function __construct($input){
		$this->input=$input;
	}

	public function runCode(){
		exec($this->python." ".$this->input." 2> log",$this->output,$this->return);
	}

	public function getOutput(){
		return $this->output;
	}
	public function getReturnValue(){
		return $this->return;
	}

}
