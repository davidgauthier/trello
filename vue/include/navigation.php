<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Nnavigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">NEW TRELLO</a>
        </div>
        
        <div id="navbar" class="navbar-collapse collapse">

            <form class="navbar-form navbar-right">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal_form_add_task">
                    Ajouter une tache
                </button>
            </form>
            
        </div>

    </div>
</nav>






<?php
    include("vue/include/modal_form_new_task.php");
?>












