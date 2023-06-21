<?php 

require_once 'config/config.php';
require_once 'Models/db.php';

if(!isset($_GET["controller"])) $_GET["controller"] = constant("DEFAULT_CONTROLLER");
if(!isset($_GET["action"])) $_GET["action"] = constant("DEFAULT_ACTION");

$controller_path = 'controller/'.$_GET["controller"].'Ct.php';

if(!file_exists($controller_path)) $controller_path = 'controller/'.constant("DEFAULT_CONTROLLER").'Ct.php';

require_once $controller_path;
$controllerName = $_GET["controller"].'Ct';
$controller = new $controllerName();

$dataToView["data"] = array();
if(method_exists($controller,$_GET["action"])) $dataToView["data"] = $controller->{$_GET["action"]}();

require_once 'layouts/header.php';
require_once 'view/'.$controller->vista.'.php';
require_once 'layouts/footer.php';

?>