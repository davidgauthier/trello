<?php
    //header("location: vue/index.php");

	require("modele/autoLoader.php");
    AutoLoader::register();
    

    $routeur = new Routeur();
    $routeur->dispatch();

    //require("controller/controller.php");







?>
