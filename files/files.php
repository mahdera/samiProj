<?php
/*
* jQuery File Upload Plugin PHP Example 5.14
* https://github.com/blueimp/jQuery-File-Upload
*
* Copyright 2010, Sebastian Tschan
* https://blueimp.net
*
* Licensed under the MIT license:
* http://www.opensource.org/licenses/MIT
*/

error_reporting(E_ALL | E_STRICT);
require_once '../classes/UploadHandler.php';
$upload_handler = new UploadHandler();
//right here store metadata info to the database...
//require_once 'uploadeddocument.php';
//saveUploadedDocuments($files[0], $_SESSION['LOGGED_USER_ID']);
//echo 'the file name is : ' . $files[0];
?>
