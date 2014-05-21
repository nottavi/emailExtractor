<?php
/**
 * Created by PhpStorm.
 * User: nottavi
 * Date: 21/05/14
 * Time: 17:58
 */

require 'vendor/autoload.php';

use Symfony\Component\Finder\Finder;
use

$finder = new Finder();

$iterator = $finder->files()->name('*.xls*')->in('/Users/nottavi/Google Drive/Projets/Andros/NL21/');

foreach ($iterator as $file) {

}

?>
