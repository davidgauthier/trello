<?php

class ColumnManager extends DatabaseManager {
	

	/*
	* Fonction pour ajouter une column dans la bdd
	* return true ou false
	*/
	function newColumn($column){

		try {
            $this->getBdd();

            $req = $this->bdd->prepare('INSERT INTO `column`(`label`, `ordre`) VALUES (:label, :ordre) ');
			
			$req->execute(array(
			    'label'	=> $column->getLabel(),
			    'ordre'	=> $column->getOrdre()
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
    * Fonction pour modifier une column en bdd
    * return true ou false
    */
    function updateColumn($column){

        try {
            $this->getBdd();

            $req = $this->bdd->prepare('UPDATE `column` SET `label`=:label, `ordre`=:ordre WHERE `id`= :id');

            $req->execute(array(
                'label' => $column->getLabel(),
                'ordre' => $column->getOrdre(),
                'id'    => $column->getId()
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







	function getColumnById($id)
    {
        try {
            $this->getBdd();

            $query = $this->bdd->prepare("SELECT * FROM `column` WHERE `id`=:id_column");
            $query->bindParam("id_column", $id, PDO::PARAM_STR);
            $query->execute();

            if ($query->rowCount() > 0) {
                $c = new Column($query->fetch(PDO::FETCH_OBJ));
                return $c;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }





    function getColumns($limit)
    {

        try {
            $this->getBdd();

            $query = $this->bdd->prepare("SELECT * FROM `column` ORDER BY `ordre` ASC LIMIT :limite");
            $query->bindParam("limite", $limit, PDO::PARAM_INT);
            $query->execute();

            $t_c = array();
            if ($query->rowCount() > 0) {
                $result = $query->fetchAll(PDO::FETCH_OBJ);
                foreach ($result as $key => $value) {
                    $c = new Column($value);
                    array_push($t_c, $c);
                }
            }
            return $t_c;

        } catch (PDOException $e) {
            exit($e->getMessage());
        }


    }




    function getFirstColumn(){

        try {
            $this->getBdd();

            $query = $this->bdd->prepare("SELECT * FROM `column` WHERE `ordre` = :ordre");
            $query->bindParam("ordre", intval(1), PDO::PARAM_INT);
            $query->execute();


            if ($query->rowCount() > 0) {
                $c = new Column($query->fetch(PDO::FETCH_OBJ));
                return $c;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            exit($e->getMessage());
        }

    }

    function getPrevColumn($column){

        try {
            $this->getBdd();

            $query = $this->bdd->prepare("SELECT * FROM `column` WHERE `ordre` = :ordre");
            $query->bindParam("ordre", intval($column->getOrdre()-1), PDO::PARAM_INT);
            $query->execute();


            if ($query->rowCount() > 0) {
                $c = new Column($query->fetch(PDO::FETCH_OBJ));
                return $c;
            } else {
                return false;
            }


        } catch (PDOException $e) {
            exit($e->getMessage());
        }

    }



    function getNextColumn($column){

        try {
            $this->getBdd();

            $query = $this->bdd->prepare("SELECT * FROM `column` WHERE `ordre` = :ordre");
            $query->bindParam("ordre", intval($column->getOrdre()+1), PDO::PARAM_INT);
            $query->execute();


            if ($query->rowCount() > 0) {
                $c = new Column($query->fetch(PDO::FETCH_OBJ));
                return $c;
            } else {
                return false;
            }
            

        } catch (PDOException $e) {
            exit($e->getMessage());
        }

    }











}

?>