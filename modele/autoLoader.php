<?php



class AutoLoader {


	public static function register() {
		spl_autoload_register(array(__CLASS__, 'autoload'));
	}
	

    public static function autoload($class) {
    	if(file_exists("modele/".$class.".php"))
        	require ("modele/".$class.".php");
        else if (file_exists("controller/".$class.".php"))
        	require ("controller/".$class.".php");
    }
    
}

?>