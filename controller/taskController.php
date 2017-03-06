<?php

class TaskController{


	public function newTaskAction(){

		$cm = new ColumnManager();
		$tm = new TaskManager();

		if($_POST['task_name'] != "" && $_POST['task_description'] != ""){

			$first_column	= $cm->getFirstColumn();
			$nb_tasks 		= count( $first_column->getTasks() );

			$t = new Task();
			$t->setName($_POST['task_name']);
			$t->setDescription($_POST['task_description']);
			$t->setId_Column($first_column->getId());
			$t->setOrdre($nb_tasks + 1);

			// enregistrement
			$tm->newTask($t);
		} else {
			$_SESSION['alert'] = "Champs mal remplis";
		}

		// Affichage
		$columns = $cm->getColumns(10); // arg : limit
		require ("vue/vue_accueil.php");

	}





	public function editTaskAction($taskId){

		$cm = new ColumnManager();
		$tm = new TaskManager();

		$t = $tm->getTaskById($taskId);

		$actual_column 		= $t->getColumn();
		// Maintenant qu'on a notre colonne, il faut décrémenter/incrémenter
		// l'ordre des autres taches de cette colonne (s'il y en a)
		/////////////////////////////////////////////
		////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		$selected_column	= $cm->getColumnById($_POST['form_change_column_task__select_column_id']);
		$nb_tasks 			= count( $selected_column->getTasks() );

		$t = $tm->getTaskById($taskId);
		$t->setId_Column($selected_column->getId());
		$t->setOrdre($nb_tasks + 1);

		// enregistrement
		$tm->updateTask($t);

		// Affichage
		$columns = $cm->getColumns(10); // arg : limit
		require ("vue/vue_accueil.php");


	}





	public function incrOrdreTaskAction($taskId){

		$cm = new ColumnManager();
		$tm = new TaskManager();

		$t 			= $tm->getTaskById($taskId);
		$nextTask 	= $tm->getNextTask($t);

		$t->setOrdre($t->getOrdre()+1);
		//var_dump($nextTask->getOrdre());exit();
		$nextTask->setOrdre($nextTask->getOrdre()-1);

		// enregistrement
		$tm->updateTask($t);
		$tm->updateTask($nextTask);

		// Affichage
		$columns = $cm->getColumns(10); // arg : limit
		require ("vue/vue_accueil.php");

	}



	public function decrOrdreTaskAction($taskId){

		$cm = new ColumnManager();
		$tm = new TaskManager();

		$t 			= $tm->getTaskById($taskId);
		$prevTask 	= $tm->getNextTask($t);

		$t->setOrdre($t->getOrdre()-1);
		$prevTask->setOrdre($prevTask->getOrdre()+1);

		// enregistrement
		$tm->updateTask($t);
		$tm->updateTask($prevTask);

		// Affichage
		$columns = $cm->getColumns(10); // arg : limit
		require ("vue/vue_accueil.php");

	}



}

?>