<?php

/**
 * Description of ClassLoader
 *
 * (c) lsroudi <http://lsroudi.com/> <lsroudi@gmail.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class ClassLoader {

    private $classPath;

    public function __construct($classPath)
    {
        $this->classPath = $classPath;
        $this->autoload();
    }

    public function autoload()
    {
        spl_autoload_register(function () {
                    require_once'./Config/' . $this->classPath . '.php';
                });
    }

    public function displayInludedFile()
    {
        print(var_dump(Config::BAR));          // 10
        print(var_dump(get_required_files()));
    }

}

$autoload = new ClassLoader('Config');
$autoload->displayInludedFile();
?>

