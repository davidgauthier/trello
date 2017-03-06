<?php

class Routeur {
	

	private $indexController;
	private $userController;
	private $videoController;


	public function __construct() {
		$this->indexController 	= new IndexController();
		$this->columnController	= new ColumnController();
		$this->taskController 	= new TaskController();
	}

	





	public function dispatch(){
		try{


			// Si le formulaire de création de colonne à été validé
			if(isset($_POST['submit_form_new_task'])){

				//var_dump($_POST);exit();


				// Ici faire les vérifications des champs
				// if(isset($_POST['task_name']) && $_POST['task_name'] != ""){

				// } else {
				// 	throw new Exception("Le champs 'titre' n'est pas valide");
				// }

				$this->taskController->newTaskAction();
			} else if(isset($_POST['form_change_column_task__task_id']) && isset($_POST['form_change_column_task__select_column_id'])){

				// var_dump($_POST);
				// exit();
				$this->taskController->editTaskAction($_POST['form_change_column_task__task_id']);




			} else if (isset($_POST['action']) && $_POST['action'] == "decrOrdreColumn" && isset($_POST['id_column'])){

				$this->columnController->decrOrdreColumnAction($_POST['id_column']);

			} else if (isset($_POST['action']) && $_POST['action'] == "incrOrdreColumn" && isset($_POST['id_column'])){

				$this->columnController->incrOrdreColumnAction($_POST['id_column']);



			} else if (isset($_POST['action']) && $_POST['action'] == "decrOrdreTask" && isset($_POST['id_task'])){

				$this->taskController->decrOrdreTaskAction($_POST['id_task']);

			} else if (isset($_POST['action']) && $_POST['action'] == "incrOrdreTask" && isset($_POST['id_task'])){

				$this->taskController->incrOrdreTaskAction($_POST['id_task']);

			}


			else {

				$this->indexController->pageAccueilAction();
			}


		}
		catch (Exception $e) {
			$this->erreur($e->getMessage());
		}
	}



	private function erreur($erreur){
		$this->indexController->pageErreurAction($erreur);
		// $vue = new Vue("Erreur");
		// $vue->generer(array('erreur' => $erreur));
	}





}












?>