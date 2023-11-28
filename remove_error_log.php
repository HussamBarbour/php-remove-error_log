<?php

function deleteErrorLogs($directory) {
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST
    );

    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getFilename() === 'error_log') {
            if (unlink($file->getPathname())) {
                echo 'Deleted: ' . $file->getPathname() . '<br>';
            } else {
                echo 'Failed to delete: ' . $file->getPathname() . '<br>';
            }
        }
    }
}

$websiteRoot = './'; // Replace this with the actual path to your website's root directory
deleteErrorLogs($websiteRoot);

?>
