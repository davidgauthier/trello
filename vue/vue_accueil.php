<?php

    
$titre = "New Trello !";


$cm = new ColumnManager();
$tm = new TaskManager();



ob_start();


?>


<div class="row">



    <?php
    if(!empty($columns)){

        foreach($columns as $column) {
            $columnTasks = $column->getTasks();
    ?>

        <div class="col-md-3">
            <h2>
                <?php echo $column->getLabel(); ?> <span class="badge"><?php echo count($columnTasks); ?></span>
                <span class="pull-right">
                    <?php if($cm->getPrevColumn($column) ){ ?>
                    <form style="display: inline-block;" class="form-inline" action="index.php" method="post">
                        <button type="submit" class="btn btn-default btn-xs">
                            <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                        </button>
                        <input type="hidden" name="action" value="decrOrdreColumn">
                        <input type="hidden" <?php echo 'name="id_column" value="'.$column->getId().'"'; ?> >
                    </form>
                    <?php } ?>
                    <?php if($cm->getNextColumn($column) ){ ?>
                    <form style="display: inline-block;" action="index.php" method="post">
                        <button type="submit" class="btn btn-default btn-xs">
                            <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                        </button>
                        <input type="hidden" name="action" value="incrOrdreColumn">
                        <input type="hidden" <?php echo 'name="id_column" value="'.$column->getId().'"'; ?> >
                    </form>
                    <?php } ?>
                </span>
            </h2>

            <?php
            if(!empty($columnTasks)){
                foreach ($columnTasks as $task) {
            ?>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>
                            <?php echo $task->getName(); ?>
                            <span class="pull-right">
                                <!-- <?php //if($tm->getPrevTask($task) ){ ?>
                                <form style="display: inline-block;" action="index.php" method="post">
                                    <button type="submit" class="btn btn-default btn-xs">
                                        <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span>
                                    </button>
                                    <input type="hidden" name="action" value="incrOrdreTask">
                                    <input type="hidden" <?php //echo 'name="id_task" value="'.$task->getId().'"'; ?> >
                                </form>
                                <?php //} ?>
                                <?php //if($tm->getNextTask($task) ){ ?>
                                <form style="display: inline-block;" action="index.php" method="post">
                                    <button type="submit" class="btn btn-default btn-xs">
                                        <span class="glyphicon glyphicon-arrow-down" aria-hidden="true"></span>
                                    </button>
                                    <input type="hidden" name="action" value="decrOrdreTask">
                                    <input type="hidden" <?php //echo 'name="id_task" value="'.$task->getId().'"'; ?> >
                                </form>
                                <?php //} ?> -->
                                <!-- <form style="display: inline-block;" action="index.php" method="post">
                                    <button type="submit" class="btn btn-default btn-xs">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    </button>
                                    <input type="hidden" name="action" value="incrOrdreColumn">
                                    <input type="hidden" <?php //echo 'name="id_column" value="'.$column->getId().'"'; ?> >
                                </form> -->
                            </span>
                        </h4>
                        
                        <p>
                            <?php echo $task->getDescription(); ?>
                        </p>

                        <?php
                        if(!empty($columns) && count($columns) >= 2){ // Il faut minimum deux colonnes pour pouvoir déplacer des tasks
                        ?>
                            <form <?php echo 'id="form_change_column_task_'.$task->getId().'"'; ?> method="post" action="index.php">
                                <?php echo '<select name="form_change_column_task__select_column_id" onchange="document.getElementById(\'form_change_column_task_'.$task->getId().'\').submit();">'; ?>
                                <?php
                                foreach($columns as $column) {
                                    if($column->getId() == $task->getColumn()->getId()){
                                        echo '<option selected value="'.$column->getId().'">'.$column->getLabel().'</option>';
                                    } else {
                                        echo '<option value="'.$column->getId().'">'.$column->getLabel().'</option>';
                                    }
                                }
                                ?>
                                </select>
                                <?php echo '<input type="hidden" name="form_change_column_task__task_id" value="'.$task->getId().'">'; ?>
                            </form>
                        <?php
                        }
                        ?>

                    </div>
                </div>

            <?php
                }
            }
            ?>

        </div> <!-- end .col-md-3 -->

    <?php
        }
    } else{
        echo '<p>Pas (encore) de colonne.. <a href="#">En créer une</a></p>';
    }
    ?>

    <hr>
        


</div> <!-- end .row -->




<?php
    $contenu = ob_get_clean();
?>

<?php
    require ("layout.php");
?>
