<?php

class IndexController{


	public function pageAccueilAction(){

		// les deux manager car on en a besoin dans la vue
		$cm = new ColumnManager();
		$tm = new TaskManager();

		$columns = $cm->getColumns(10); // arg : limit
		require ("vue/vue_accueil.php");

	}



	public function pageErreurAction($error){
		require("vue/vue_erreur.php");
	}


}

?>