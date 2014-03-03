<?php

/**
 * Description of Reflection
 *
 * (c) lsroudi <http://lsroudi.com/> <lsroudi@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Reflections;

class ReflectionTest {
    //put your code here
    public function __toString()
    {
        echo 'my name is ReflectionTest';
    }
}


$classreflection = new \ReflectionClass('Reflections\ReflectionTest');

\Reflection::export($classreflection);
var_dump(get_class_methods($classreflection)); 

?>

