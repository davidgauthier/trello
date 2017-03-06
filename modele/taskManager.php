<?php

class TaskManager extends DatabaseManager {
	

	/*
	* Fonction pour ajouter une task dans la bdd
	* return true ou false
	*/
	function newTask($task){

		try {
            $this->getBdd();
            
            $req = $this->bdd->prepare('INSERT INTO `task` (`name`, `description`, `id_column`) VALUES (:name, :description, :id_column)');
			
			$req->execute(array(
			    'name' 			=> $task->getName(),
			    'description' 	=> $task->getDescription(),
			    'id_column' 	=> $task->getId_column()
			));


            $last_insert_id = $this->bdd->lastInsertId();
            if($last_insert_id > 0){
            	return $last_insert_id;
            } else {
            	return false;
            }

        } catch (PDOException $e) {
            exit($e->getMessage());
        }

	}





	/*
	* Fonction pour modifier une task en bdd
	* return true ou false
	*/
	function updateTask($task){

		try {
            $this->getBdd();
            

            $req = $this->bdd->prepare('UPDATE `task` SET `name`=:name, `description`=:description, `id_column`=:id_column, `ordre`=:ordre WHERE `id`= :id');

			$req->execute(array(
			    'name' 			=> $task->getName(),
			    'description' 	=> $task->getDescription(),
			    'id_column'	 	=> $task->getId_column(),
			    'id'			=> $task->getId(),
			    'ordre'			=> $task->getOrdre()
			));

			if ($req->rowCount() > 0) {
                //return $req->fetch(PDO::FETCH_OBJ);
                return true;
            }  else {
            	return false;
            }
            //return $this->bdd->lastInsertId();
        } catch (PDOException $e) {
            exit($e->getMessage());
        }

	}



	/*
	* fonction qui récupère une task par son id
	* return un objet Task
	*/
	function getTaskById($id){


		try {
            $this->getBdd();
            
            $query = $this->bdd->prepare("SELECT * FROM `task` WHERE `id`=:id_task");
            $query->bindParam("id_task", $id, PDO::PARAM_STR);
            $query->execute();

            if ($query->rowCount() > 0) {
            	$t = new Task($query->fetch(PDO::FETCH_OBJ));
                return $t;
            } else {
            	return false;
            }

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        
	}






	/*
	* fonction qui récupère les tasks d'une column
	*/
	public function getTasksByIdColumn($idColumn, $limite){


		try {
            $this->getBdd();
            
            $query = $this->bdd->prepare("SELECT * FROM `task` WHERE `id_column`=:id_column ORDER BY `ordre` ASC LIMIT :limite");
            $query->bindParam("id_column", $idColumn, PDO::PARAM_STR);
            $query->bindParam("limite", $limite, PDO::PARAM_INT);
            $query->execute();

            $t_t = array();
			if ($query->rowCount() > 0) {
				$result = $query->fetchAll(PDO::FETCH_OBJ);
				foreach ($result as $key => $value) {
					$t = new Task($value);
		        	array_push($t_t, $t);
				}
		    }
			return $t_t;


        } catch (PDOException $e) {
            exit($e->getMessage());
        }
        
	}






	function getPrevTask($task){

        try {
            $this->getBdd();

            $query = $this->bdd->prepare("SELECT * FROM `task` WHERE `id_column` = :id_column AND `ordre` = :ordre");
            $query->bindParam("id_column", $task->getId_column(), PDO::PARAM_INT);
            $query->bindParam("ordre", intval($task->getOrdre()-1), PDO::PARAM_INT);
            $query->execute();


            if ($query->rowCount() > 0) {
                $t = new Task($query->fetch(PDO::FETCH_OBJ));
                return $t;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }



    function getNextTask($task){

        try {
            $this->getBdd();

            $query = $this->bdd->prepare("SELECT * FROM `task` WHERE `id_column` = :id_column AND `ordre` = :ordre");
            $query->bindParam("id_column", $task->getId_column(), PDO::PARAM_INT);
            $query->bindParam("ordre", intval($task->getOrdre()+1), PDO::PARAM_INT);
            $query->execute();


            if ($query->rowCount() > 0) {
                $t = new Task($query->fetch(PDO::FETCH_OBJ));
                return $t;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }




}

?>