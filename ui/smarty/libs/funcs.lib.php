<?php

function genSessionId() {
    return date("Ymd-His") . "-" . sprintf( '%04x%04x', mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ) );
}

/*

function pushCommand() {
    $file = 'people.txt';
    // Open the file to get existing content
    $current = file_get_contents($file);
    // Append a new person to the file
    $current .= "John Smith\n";
    // Write the contents back to the file
    file_put_contents($file, $current);
}

function popCommand() {
    
}


*/

?>