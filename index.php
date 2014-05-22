<?php
/**
 * Created by PhpStorm.
 * User: nottavi
 * Date: 21/05/14
 * Time: 17:58
 */

require 'vendor/autoload.php';
require_once 'vendor/os/php-excel/PHPExcel/IOFactory.php';
use Symfony\Component\Finder\Finder;


$finder = new Finder();

$fh = fopen(__DIR__."/email.txt","a+");

$iterator = $finder->files()->name('*.xls*')->in('/Users/nottavi/Google Drive/Projets/Andros/NL21/');

foreach ($iterator as $file) {
        echo "loading ".$file->getRealPath()."\n";
        $phpExcel = $objPHPExcel = PHPExcel_IOFactory::load( $file->getRealPath() );
        $sheet = $objPHPExcel->getSheet(0);
        foreach($sheet->getRowIterator() as $row) {
            foreach ($row->getCellIterator() as $cell) {
                //print_r($cell->getValue());
                if( filter_var( $cell->getValue(), FILTER_VALIDATE_EMAIL) ):
                    //echo $cell->getValue()."\n";
                    fwrite($fh, $cell->getValue()."\n");
                endif;
            }
        }
        rename( $file->getRealPath(), $file->getRealPath().".done" );
}

fclose( $fh );

?>
