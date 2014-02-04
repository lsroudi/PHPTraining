<?php

/**
 * Description of ClassExist
 *
 * (c) lsroudi <http://lsroudi.com/> <lsroudi@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
// Exist.php
$classname = "Exist";
$path = "Classes/{$classname}.php";


try {
    if (!file_exists($path)){
        throw new Exception("No such file as {$path}");
    }
} catch (Exception $exc) {
    echo $exc->getMessage();
}

require_once( $path );

try {
    $qclassname = "Functions\\Classes\\$classname";
    if (!class_exists($qclassname))
    {
        throw new Exception("No such class as $qclassname");
    }
} catch (Exception $exc) {
    echo $exc->getMessage();
}


$myObj = new $qclassname();
$myObj->doSpeak();
?>

