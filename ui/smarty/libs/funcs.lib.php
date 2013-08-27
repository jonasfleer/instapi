<?php

function genSessionId() {
    return date("Ymd-His") . "-" . sprintf( '%04x%04x', mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ) );
}

function computeThumbfileName($pic_id, $geometry) {
    $geometry_identifier = preg_replace('/[^A-Za-z0-9]/', '', $geometry);
    return $pic_id . '_' . $geometry_identifier;
}

?>