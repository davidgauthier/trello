<?php

class ColumnController{

	public function incrOrdreColumnAction($columnId){

		$cm = new ColumnManager();
		$tm = new TaskManager();

		$c 			= $cm->getColumnById($columnId);
		$nextColumn = $cm->getNextColumn($c);

		$c->setOrdre($c->getOrdre()+1);
		$nextColumn->setOrdre($nextColumn->getOrdre()-1);

		// enregistrement
		$cm->updateColumn($c);
		$cm->updateColumn($nextColumn);

		// Affichage
		$columns = $cm->getColumns(10); // arg : limit
		require ("vue/vue_accueil.php");

	}



	public function decrOrdreColumnAction($columnId){

		$cm = new ColumnManager();
		$tm = new TaskManager();

		$c 			= $cm->getColumnById($columnId);
		$prevColumn = $cm->getPrevColumn($c);

		$c->setOrdre($c->getOrdre()-1);
		$prevColumn->setOrdre($prevColumn->getOrdre()+1);

		// enregistrement
		$cm->updateColumn($c);
		$cm->updateColumn($prevColumn);

		// Affichage
		$columns = $cm->getColumns(10); // arg : limit
		require ("vue/vue_accueil.php");

	}



}





?>