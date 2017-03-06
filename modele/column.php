<?php

/**
* 
*/
class Column
{

	use HelperTrait;

	protected $id;
	protected $label;
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

	public function getLabel(){
		return $this->label;
	}
	public function setLabel($label){
		$this->label = $label;
	}

	public function getOrdre(){
		return $this->ordre;
	}
	public function setOrdre($ordre){
		$this->ordre = $ordre;
	}


	public function getTasks(){
		$tm = new TaskManager();
		$tasks = $tm->getTasksByIdColumn($this->getId(), 50); //2eme arg : limit
		return $tasks;
	}




	public function getPrevColumn(){
		$cm 		= new ColumnManager();
		$prevColumn = $cm->getPrevColumn($this);
		return $prevColumn;
	}


	public function getNextColumn(){
		$cm 		= new ColumnManager();
		$nextColumn = $cm->getNextColumn($this);
		return $nextColumn;
	}






}


?>