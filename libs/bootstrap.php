<?php

//set_include_path(';C:\xampp\htdocs\;C:\xampp\htdocs\libs ;C:\xampp\htdocs\framework');
#set_include_path('/kunden/homepages/26/d804325784/htdocs/');
date_default_timezone_set("Europe/London");


define('ENVIRONMENT', 'development');
define("DEBUG", TRUE);
define("APP_PATH", dirname(__DIR__) .'/libs');

require('autoloader.php');
try
{
    // imagine autoloader
    
    spl_autoload_register(function($class)
    {
        $path = lcfirst(str_replace("\\", DIRECTORY_SEPARATOR, $class));
        $file = APP_PATH."/application/libraries/{$path}.php";
        
        if (file_exists($file))
        {
            require_once $file;
            return true;
        }
    });

   
    // plugins
    /*
    $path = APP_PATH . "/application/plugins";
    $iterator = new DirectoryIterator($path);
    
    foreach ($iterator as $item)
    {
        if (!$item->isDot() && $item->isDir())
        {
            include($path . "/" . $item->getFilename() . "/initialize.php");
        }
    }
    */

#set_include_path(';C:\xampp\htdocs\;C:\xampp\htdocs\libs');
#set_include_path('/kunden/homepages/26/d804325784/htdocs/');
$root_dir = $_SERVER['DOCUMENT_ROOT'];

require __DIR__ . '/../vendor/autoload.php';

//require("framework/core.php");
//Framework\Core::initialize();
$loader = new Nette\Loaders\RobotLoader;

// Add directories for RobotLoader to index


$loader->addDirectory($_SERVER['DOCUMENT_ROOT']. '/libs');
$loader->addDirectory($_SERVER['DOCUMENT_ROOT']. '/inc');

$loader->setTempDirectory(__DIR__ . '/temp');
$loader->register(); // Run the RobotLoader

//include $root_dir. "/inc/dbconnect.inc.php";
//include 'libs/ChromePhp.php';

//set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\xampp\htdocs');

//require('libs/autoloader.php');
// 1. define the default path for includes

// 2. load the Core class that includes an autoloader
require("framework/core.php");

Framework\Core::initialize();
// 3. load and initialize the Configuration class
$configuration = new Framework\Configuration(array(
    "type" => "ini"
));
Framework\Registry::set("configuration", $configuration->initialize());

// 4. load and initialize the Database class – does not connect

$database = new Framework\Database('Mysql');
Framework\Registry::set("database", $database->initialize());

}
catch (Exception $e)
{
// list exceptions

$exceptions = array(
    "500" => array(
        "Framework\Cache\Exception",
        "Framework\Cache\Exception\Argument",
        "Framework\Cache\Exception\Implementation",
        "Framework\Cache\Exception\Service",
        
        "Framework\Configuration\Exception",
        "Framework\Configuration\Exception\Argument",
        "Framework\Configuration\Exception\Implementation",
        "Framework\Configuration\Exception\Syntax",
        
        "Framework\Controller\Exception",
        "Framework\Controller\Exception\Argument",
        "Framework\Controller\Exception\Implementation",
        
        "Framework\Core\Exception",
        "Framework\Core\Exception\Argument",
        "Framework\Core\Exception\Implementation",
        "Framework\Core\Exception\Property",
        "Framework\Core\Exception\ReadOnly",
        "Framework\Core\Exception\WriteOnly",
        
        "Framework\Database\Exception",
        "Framework\Database\Exception\Argument",
        "Framework\Database\Exception\Implementation",
        "Framework\Database\Exception\Service",
        "Framework\Database\Exception\Sql",
        
        "Framework\Model\Exception",
        "Framework\Model\Exception\Argument",
        "Framework\Model\Exception\Connector",
        "Framework\Model\Exception\Implementation",
        "Framework\Model\Exception\Primary",
        "Framework\Model\Exception\Type",
        "Framework\Model\Exception\Validation",
        
        "Framework\Request\Exception",
        "Framework\Request\Exception\Argument",
        "Framework\Request\Exception\Implementation",
        "Framework\Request\Exception\Response",
        
        "Framework\Router\Exception",
        "Framework\Router\Exception\Argument",
        "Framework\Router\Exception\Implementation",
        
        "Framework\Session\Exception",
        "Framework\Session\Exception\Argument",
        "Framework\Session\Exception\Implementation",
        
        "Framework\Template\Exception",
        "Framework\Template\Exception\Argument",
        "Framework\Template\Exception\Implementation",
        "Framework\Template\Exception\Parser",
        
        "Framework\View\Exception",
        "Framework\View\Exception\Argument",
        "Framework\View\Exception\Data",
        "Framework\View\Exception\Implementation",
        "Framework\View\Exception\Renderer",
        "Framework\View\Exception\Syntax"
    ),
    "404" => array(
        "Framework\Router\Exception\Action",
        "Framework\Router\Exception\Controller"
    )
);

$exception = get_class($e);

// attempt to find the approapriate template, and render

foreach ($exceptions as $template => $classes)
{
    foreach ($classes as $class)
    {
        if ($class == $exception)
        {
            header("Content-type: text/html");
            include(APP_PATH."/application/views/errors/{$template}.php");
            exit;
        }
    }
}

// render fallback template

header("Content-type: text/html");
echo "An error occurred.";
exit;
}