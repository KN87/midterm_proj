<?php
/**
 * Created by PhpStorm.
 * User: keka
 * Date: 10/13/2017
 * Time: 6:26 PM
 */

class htmlTable extends page {

    public function get(){
        $csv_read = $_GET['filename'];
        chdir ('upload');
        $file = fopen($csv_read,"r");
        echo ("<table border='1px' style='border-collapse: collapse'>");
        while (($data=fgetcsv($file))!== FALSE){

            echo ("<tr>\r\n");
            foreach($data as $value) {

                echo ("\t<td>$value</td>\r\n");

            }
            echo("</tr>\r\n");
        }
        echo("</table>");
        fclose($file);
    }
}