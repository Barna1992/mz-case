<?php
if(isset($_POST['folder'])){
    $uploadDir = './uploads';
    $new_dir_path = $uploadDir . DIRECTORY_SEPARATOR . $_POST['id'] . DIRECTORY_SEPARATOR . $_POST['folder'];
    $files = scandir($new_dir_path);
    $firstFile = $new_dir_path . DIRECTORY_SEPARATOR . $files[2];
    unlink($firstFile);
    rmdir($new_dir_path);
}
?>