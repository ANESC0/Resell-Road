<?php
class ImageHelper{

        public function uploadFileImage($uploadPath) {
            
            if (isset($_FILES["img"])) {
                $error_status = $_FILES["img"]["error"];
                if ( $error_status > 0 ) {
                $error_types = array(
                    1 => 'Exceeds php.ini upload_max_filesize',
                    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
                    3 => 'The uploaded file was only partially uploaded',
                    4 => 'No file was uploaded',
                    6 => 'Missing a temporary folder',
                    7 => 'Failed to write file to disk.',
                    8 => 'A PHP extension stopped the file upload.', 
                );
                if (($error_status <= 8) && ($error_status !== 5)) { 
                    throw new Exception('ERROR : '. $error_types[$error_status]);
                } else {
                    throw new Exception('ERROR : Unknown');
                }
                }
            } else {
                throw new Exception('ERROR : No file provided for upload' );
            }
            $informationsImage = pathinfo($_FILES["img"]["name"]);
            $extensionImage = $informationsImage["extension"];
            $extensionArray = ["png","gif","jpg","jpeg","webp"];

            if (in_array($extensionImage,$extensionArray)){
                $img = time().rand().rand().'.'.$extensionImage;
                $uploadedPath = $uploadPath.$img;   
                $result = move_uploaded_file($_FILES["img"]["tmp_name"], $uploadedPath);
                if ($result === false) {
                throw new Exception('ERROR : Unknown');
                }
                return  $uploadedPath;
            } else {
                throw new Exception('ERROR : Invalid image format');
            }
     }
    }