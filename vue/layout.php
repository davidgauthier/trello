<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="The new trello is here">
        <meta name="author" content="David GAUTHIER">
        <link rel="icon" href="vue/images/icon-valise.ico">

        <title><?php echo $titre; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    </head>

    <body>


        <?php
        // La navigation
        include("include/navigation.php");
        ?>




        <div class="container-fluid" style="padding-top:100px;">
            

            <?php
                echo $contenu;
            ?>



            

            <hr>
        
            <?php 
                // Le footer
                include("include/footer.php");
            ?>


        </div> <!-- /container fluid -->


        <?php 
        // Le JS
        include("include/scripts.php");
        ?>
             
    
    </body>
    
</html>
