<?php

//UploadController uploads an xml file
class UploadController {

    const InputKey = 'myfile';
    const AllowedType = 'text/xml';

    public function view() {
        require_once('views/upload/upload.php');
    }

    public function upload() {

        if (isset($_FILES) && !empty($_FILES[self::InputKey]['tmp_name'])) {
            //Check if incorrect file type. If correct file type, upload.
            if ($_FILES[self::InputKey]['type'] != self::AllowedType) {
                $error = "Invalid file type.";
            } else {
                $tmpFile = $_FILES[self::InputKey]['tmp_name'];
                $destinationFile = 'uploads/mood.xml';

                move_uploaded_file($tmpFile, $destinationFile);

                //Clean up the temp file
                if (file_exists($tmpFile)) {
                    unlink($tmpFile);
                }

                //Redirect to mood controller (moodslider page)
                header("Location: index.php?controller=mood&action=view");
                die();
            }
        } else {
            //Raise error if file was not uploaded
            $error = "No file was uploaded....";
        }

        require_once('views/upload/upload.php');
    }

}
