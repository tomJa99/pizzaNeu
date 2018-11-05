<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);

/*Autoload Beispiel
function autoload($className)
{
    require "classes/$className.php";
}
spl_autoload_register("autoload");
*/

// Daten-"Model"
require "classes/ShopData.php";
$model = new ShopData();

// Shop-"Controller"
require "classes/ShopActions.php";
$controller = new ShopActions($model);

//ggf. Action-Controller ausführen
if (isset($_REQUEST['action']) && !empty($_REQUEST['action']))
{
    $controller->{$_REQUEST['action']}($_REQUEST['actionValue']);
}

//"Vorlagen" für Views
require "views/Seite.php";  // Eltern-Klasse "Seite"
require "views/ISeite.php"; // Interface "ISeite"

// View
$page = htmlspecialchars($_REQUEST['page']);
$page = str_replace("/", "", $page);

if ($page == "" || !file_exists("views/$page.php"))
{
    $page = "Startseite";
}
require "views/$page.php";
$view = new $page($controller, $model);

// Ausgabe
echo $view->output();