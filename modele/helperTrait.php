<?php

trait HelperTrait {
	

	public function debug(){
		var_dump(__CLASS__);
		exit();
	}



	public function hydrate($data){
		foreach ($data as $key => $value) {
			$setteur = 'set'.ucfirst($key);
			// var_dump($setteur);exit();
			if(method_exists($this, $setteur)){
				$this->$setteur($value);
			}
		}
	}
	

}

?>