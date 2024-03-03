<?php
if (isset($_GET['remove_file']))
{
    $file_Path = $_GET['remove_file'];

    if (file_exist($file_Path))
    {
        unlink($file_Path);
        print 'File Deleted';
    }else{
        print 'File Not Exist';
    }
}