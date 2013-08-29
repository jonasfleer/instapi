<?php



function genSessionId() {
    return date("Ymd-His") . "-" . sprintf( '%04x%04x', mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ) );
}

function computeThumbfileName($pic_id, $geometry) {
    $geometry_identifier = preg_replace('/[^A-Za-z0-9]/', '', $geometry);
    return $pic_id . '_' . $geometry_identifier;
}


/*
function printPics($pic_id) {
    
    $masterimage_path = PRINT_MASTER_DIR . '/' . $pic_id . '.jpg';
    $pic1_path = PIC_DIR. '/' . $pic_id . '_1.jpg';
    $pic2_path = PIC_DIR. '/' . $pic_id . '_2.jpg';
    $pic3_path = PIC_DIR. '/' . $pic_id . '_3.jpg';
    $pic4_path = PIC_DIR. '/' . $pic_id . '_4.jpg';
    
    $cmd = 'convert -size '.(ORIG_WIDTH*2).'x'.(ORIG_HEIGHT*2).' xc:white '.
      ' \\( ' . $pic4_path . ' -resize '.ORIG_WIDTH.'\\> \\) -geometry +0+0 -composite '.
      ' \\( ' . $pic3_path . ' -resize '.ORIG_WIDTH.'\\> \\) -geometry +'.ORIG_WIDTH.'+0 -composite '.
      ' \\( ' . $pic2_path . ' -resize '.ORIG_WIDTH.'\\> \\) -geometry +0+'.ORIG_HEIGHT.' -composite '.
      ' \\( ' . $pic1_path . ' -resize '.ORIG_WIDTH.'\\> \\) -geometry +'.ORIG_WIDTH.'+'.ORIG_HEIGHT.
      ' -composite '. $masterimage_path;
    
    if (DEBUGME) { syslog(LOG_INFO, 'instapi exec: ' . $cmd); }
    $out = exec($cmd, $exec_out);

    // -o landscape
    
    if (file_exists($masterimage_path)) {
        $options = '-d cp900 -n 1 -s -t "'.$pic_id.'" -o media=Custom.15x10cm -o scaling=100 --';
        $cmd = 'lp '.$options.' '.$masterimage_path;
        if (DEBUGME) { syslog(LOG_INFO, 'instapi exec: ' . $cmd); }
        //    $out = exec($cmd, $exec_out);
    } else {
        error_log("Print master file does not exist: " . $masterimage_path);
    }

    return $masterimage_path;
}
*/
?>