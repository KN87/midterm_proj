<?php
/**
 * Created by PhpStorm.
 * User: keka
 * Date: 10/13/2017
 * Time: 6:53 PM
 */

class uploadForm extends page
{
    public function get()
    {
        $form = '<form action="index.php" method="post" enctype= "multipart/form-data">';
        $form .= '<input type="file" name="fileToUpload" id="fileToUpload">';
        $form .= '<input type="submit" value="Submit" name="submit">';
        $form .= '</form> ';
        $this->html .= '<h1>Upload Form</h1>';
        $this->html .= $form;

    }

    public function post()
    {
        $target_dir = "upload/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        echo $target_file; //used for debugging

        if (file_exists($target_file)) {
            unlink($target_file);
        }


        if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
            echo "File is valid, and was successfully uploaded.\n";
            $csv_name = $_FILES["fileToUpload"]["name"];
            header("Location:?page=htmlTable&filename=$csv_name");
        }
        else {
            echo "Upload failed";
        }


    }
}