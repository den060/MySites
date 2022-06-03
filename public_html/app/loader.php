<?php 
	

	define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'].'/');
    define('APP_PATH', 'app');

    // logger
    function dd($var) {
        ob_end_clean();
        $backtrace = debug_backtrace();
        echo "\n<pre style='color: red'>\n"; var_dump($var); echo "</pre>\n";
        die;
    }
    
    // json output
    function alert($status, $msg) {
        return print(json_encode(
            array('status' => $status, 'msg' => $msg)
        ));
    }
    
    // Шаблонизатор
    function template($args) {
        define('page', $args[1].'.php');
        require(BASE_PATH."/resources/".$args[0].".php");
    }

	require('Nanite.php');
	require(BASE_PATH.'/web.php');

	if(!Nanite::$routeProccessed) return template(['pages/404', null]);