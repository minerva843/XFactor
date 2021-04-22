<?php

/* * ****************************************************************************************
 * @name:       save-temp-avatar.php - part of jQuery script for creating vector avatars
 * @version:    1.5
 * @URL:        https://svgavatars.com
 * @copyright:  (c) 2014-2019 DeeThemes (https://codecanyon.net/user/DeeThemes)
 * @licenses:   https://codecanyon.net/licenses/regular
 *              https://codecanyon.net/licenses/extended
 *
 * Store avatars on a server in the temporary 'temp-avatars' directory
 * ***************************************************************************************** */
// require validation functions
require_once( 'validation.php' );

// getting and validating file name and image data from POST
// returned $file will be an array with name and type
$file = svgAvatars_validate_filename($_POST['filename']);
if ($file['type'] !== 'invalid') {
    $valid_data = svgAvatars_validate_imagedata($_POST['imgdata'], $file['type']);
} else {
    die('error 1');
}

// if filename is correct
if ($file['name'] !== 'invalid' && $file['type'] !== 'invalid') {
    if ($file['type'] === 'png') {
        // cheking that validated image data is not empty
        if ($valid_data !== false) {
            $dir = '../temp-avatars/';
            // $dir ='http://13.235.169.150/XFactor/assets/svgavatar/for_upload/svgavatars/temp-avatars/';
            if (is_dir($dir) && is_writable($dir)) {
                $valid_data = base64_decode($valid_data);
                file_put_contents($dir . $file['name'] . '.png', $valid_data);
                // echo $_POST['user'];                exit();

                $servername = "localhost";
                $username = "root";
                $password = "i-00f4e72e85630abb3";
                $dbname = "xfactors_db";

// Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $file_name_png = $file['name'].'.png';
                $user = $_POST['user'];
                $sql = "UPDATE users SET avatar='$file_name_png' WHERE id=$user";

                if ($conn->query($sql) === TRUE) {
                    die($file_name_png);
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                $conn->close();
                
            } else {
                die('error 2');
            }
        } else {
            die('error');
        }
    } elseif ($file['type'] === 'svg') {
        // cheking that validated code is SVG
        if (strpos($valid_data, '<svg xmlns="http://www.w3.org/2000/svg" version="1.1"') !== false && strrpos($valid_data, '</svg>', -6) !== false) {
            $valid_data = stripcslashes($valid_data);
            $dir = '../temp-avatars/';
            if (is_dir($dir) && is_writable($dir)) {
                file_put_contents($dir . $file['name'] . '.svg', $valid_data);
                die('saved');
            } else {
                die('error');
            }
        } else {
            die('error');
        }
    }
} else {
    die('error');
}