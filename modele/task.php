<?php

/**
* 
*/
class Task
{

	use HelperTrait;

	protected $id;
	protected $name;
	protected $description;
	protected $id_column;
	protected $ordre;
	

	public function __construct($array = null){

		if(!empty($array)){
			$this->hydrate($array);
		}

	}


	public function getId(){
		return $this->id;
	}
	public function setId($id){
		$this->id = $id;
	}

	public function getName(){
		return $this->name;
	}
	public function setName($name){
		$this->name = $name;
	}

	public function getDescription(){
		return $this->description;
	}
	public function setDescription($description){
		$this->description = $description;
	}


	public function getId_column(){
		return $this->id_column;
	}
	public function setId_column($id_column){
		$this->id_column = $id_column;
	}


	public function getOrdre(){
		return $this->ordre;
	}
	public function setOrdre($ordre){
		$this->ordre = $ordre;
	}



	public function getColumn(){
		$cm = new ColumnManager();
		$column = $cm->getColumnById($this->getId_column());
		return $column;
	}




	public function getPrevTask(){
		$tm 		= new TaskManager();
		$prevTask	= $tm->getPrevTask($this);
		return $prevTask;
	}


	public function getNextTask(){
		$tm 		= new TaskManager();
		$nextTask	= $tm->getNextTask($this);
		return $nextTask;
	}



}


?>