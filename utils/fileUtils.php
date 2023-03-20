<?php

function saveFile($file, $path)
{
    $filename = uniqid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
    $targetPath = $path . '/' . $filename;
    
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        return $filename;
    } else {
        return false;
    }
}

?>
