<?php

/**
 * Description of ClassExist
 *
 * (c) lsroudi <http://lsroudi.com/> <lsroudi@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

interface BaseInterface {
    
}
class Base {
    
}

class ClassExist extends Base  implements BaseInterface{

    public $publicproperty = NULL;

    public function findFile($file)
    {
        $path = "Classes/{$file}.php";
        try {
            if (!file_exists($path)){
                throw new Exception("No such file as {$path}");
            }
        } catch (Exception $e) {
            // Log this Event

            return false;
        }

        return $path;
    }

    public function findClass($class)
    {
        try {
            $classname = "Functions\\Classes\\$class";
            if (!class_exists($classname)){
                throw new Exception("No such class as $classname");
            }
        } catch (Exception $e) {
            // Log this Event

            return false;
        }

        return $classname;
    }
    
    public function verifyCallFunctionMethod()
    {
        return "method is called";
    }
}

$myObj = new ClassExist();
if (in_array('findFile', get_class_methods($myObj)))
{
    $path = $myObj->findFile('Exist');
}


if (false !== $path){
    require_once( $path );
    if (is_callable(array($myObj, 'findClass'))){
        $classExist = $myObj->findClass('Exist');
    }

    if (false !== $classExist){
        $class = new $classExist();
        $class->doSpeak(); // hello
    }
}

$tab = get_declared_classes();
print_r(in_array('Functions\Classes\Exist', $tab)); // true

print_r(var_dump(get_class_vars('ClassExist'))); // array (size=1) 'publicproperty' => null
print_r(get_parent_class('ClassExist')) ; // Base

if ( is_subclass_of( $myObj, 'Base' ) ) {
print "ClassExist is a subclass of Base";
}
if ( in_array( 'BaseInterface', class_implements( $myObj )) ) {
print "ClassExist is an interface of BaseInterface";
}

// Invode a function
function tocallfunction(){
    return 'function executed';
}
$return = call_user_func("tocallfunction"); 
echo $return; // function executed

$returntwo = call_user_func( array( $myObj, "verifyCallFunctionMethod") );
echo $returntwo; // function executed


?>

