
<?php


/*
set_include_path('.;C:\xampp\htdocs\libs;C:\xampp\htdocs\vender;C:\xampp\htdocs');
require('../vendor/autoload.php');
use Symfony\Component\Finder\Finder;
session_start();

function getDirContents($dir, &$results = array()){
    $files = scandir($dir);

    foreach($files as $key => $value){
        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
        if(!is_dir($path)) {
            $results[] = $path;
        } else if($value != "." && $value != ".." {
            getDirContents($path, $results);
            $results[] = $path;
        }
    }

    return $results;
}
function createLink($link){
    
   sprintf('<a href=\"testfile.php?%1$s\"> %1$s </a>', $link);
}


/*
$directory = "/xampp/htdocs/";
$exclude = array('.git', '.thistroy');
$filter = function ($file, $key, $iterator) use ($exclude) {
    if ($iterator->hasChildren() && !in_array($file->getFilename(), $exclude)) {
        return true;
    }
    return $file->isFile();
};

$innerIterator = new RecursiveDirectoryIterator(
    $directory,
    RecursiveDirectoryIterator::SKIP_DOTS
);
$iterator = new RecursiveIteratorIterator(
    new RecursiveCallbackFilterIterator($innerIterator, $filter)
);


try {
    foreach( $filesObjects as $fullFileName => $filesObject ) {

        print $fullFileName   . "\n";
    }
}
catch (UnexpectedValueException $e) {
    printf("Directory [%s] contained a directory we can not recurse into", $directory);
}
*/


$finder = new Finder();
$files = glob($_SERVER["DOCUMENT_ROOT"]."/libs");
$directories = $finder->directories()
                      ->in($files)
                      ->ignoreDotFiles(true)
                      ->exclude(array('one', 'two', 'three', 'four'))
                      ->depth(0);

foreach ($directories as $dir) {
    $files = $finder->files()
                    ->name('*.php')
                    ->in($dir->getRealPath());

    foreach ($files as $file) {
        echo '<pre>';
        //print_r($file);
        echo '</pre>';
    }
}

?>

