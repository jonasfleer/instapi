<?php
error_reporting(E_ALL | E_STRICT);

// -w, --width	: Set image width <size>
// -h, --height	: Set image height <size>
// -q, --quality	: Set jpeg quality <0 to 100>
// -r, --raw	: Add raw bayer data to jpeg metadata
// -o, --output	: Output filename <filename> (to write to stdout, use '-o -'). If not specified, no file is saved
// -v, --verbose	: Output verbose information during run
// -t, --timeout	: Time (in ms) before takes picture and shuts down (if not specified, set to 5s)
// -th, --thumb	: Set thumbnail parameters (x:y:quality)
// -d, --demo	: Run a demo mode (cycle through range of camera options, no capture)
// -e, --encoding	: Encoding to use for output file (jpg, bmp, gif, png)
// -x, --exif	: EXIF tag to apply to captures (format as 'key=value')
// -tl, --timelapse	: Timelapse mode. Takes a picture every <t>ms
// 
// Preview parameter commands
// 
// -p, --preview	: Preview window settings <'x,y,w,h'>
// -f, --fullscreen	: Fullscreen preview mode
// -op, --opacity	: Preview window opacity (0-255)
// -n, --nopreview	: Do not display a preview window
// 
// Image parameter commands
// 
// -sh, --sharpness	: Set image sharpness (-100 to 100)
// -co, --contrast	: Set image contrast (-100 to 100)
// -br, --brightness	: Set image brightness (0 to 100)
// -sa, --saturation	: Set image saturation (-100 to 100)
// -ISO, --ISO	: Set capture ISO
// -vs, --vstab	: Turn on video stablisation
// -ev, --ev	: Set EV compensation
// -ex, --exposure	: Set exposure mode (see Notes)
// -awb, --awb	: Set AWB mode (see Notes)
// -ifx, --imxfx	: Set image effect (see Notes)
// -cfx, --colfx	: Set colour effect (U:V)
// -mm, --metering	: Set metering mode (see Notes)
// -rot, --rotation	: Set image rotation (0-359)
// -hf, --hflip	: Set horizontal flip
// -vf, --vflip	: Set vertical flip
// 
// Sensor: Omnivision 5647, five megapixel
// Lens: 3.6mm F/2.0 fixed-focus
// Dimensions: 21.6mm x 25mm x 8.65mm (excluding cable)
// Weight: 3g (excluding cable)
// Cable Length: 150mm (15-core 1mm pitch ribbon cable)
// Connection: Camera Serial Interconnect (CSI)
// Maximum Still Resolution: 2,592×1,944 (currently limited to 1,920×1,080)
// Maximum Video Resolution: 1,920×1,080 (1080p) 30fps
// 
// 
// Max. quality:
// raspistill -t 3 -w 1920 -h 1080 -q 100 -o /tmp/test.jpg
// 
// raspivid -t 30000 -w 1920 -o /tmp/smallvid.h264
// 
// 
// 
// raspistill -tl 50 -w 640 -h 480 -o /tmp/timelapse.jpg -q 100 -n
// raspistill -tl 50 -w 640 -h 480 -o /tmp/timelapse_%04d.jpg -q 100 -t 30000
// raspistill -tl 1000 -w 640 -h 480 -o /tmp/timelapse_%04d.jpg -q 100 -t 30000
// raspistill -o /tmp/myimage_%04d.jpg -w 640 -h 480 -tl 1000 -t 720000
// raspistill -tl 50 -w 640 -h 480 -o /tmp/timelapse_%04d.jpg -q 100 -t 30000
// 
require_once('globals.php');

$debug = false;
$lockfilename = '/run/lock/raspistill.lock';

$width = empty($_GET['w']) ? '320' : $_GET['w'];
$height = empty($_GET['h']) ? '240' : $_GET['h'];
$quality = empty($_GET['q']) ? '10' : $_GET['q'];
$mode = empty($_GET['mode']) ? 'show' : $_GET['mode'];

if ($mode=='show') {
    $path = TEMP_DIR . '/' . uniqid() . '.jpg';
} else if (!empty($_GET['id'])) {
    // Do not return image, but save it
    $path = PIC_DIR . '/' . $_GET['id'] . '.jpg';
} else {
    error_log("No image ID given");
}

$exec_out = array();
$cmd = 'raspistill -t 0 -e jpg -n -w '.$width.' -h '.$height.' -q '.$quality.' -o ' . $path;
if ($debug) { syslog(LOG_INFO, 'instapi exec: ' . $cmd . ' Acquiring lock ...'); }

$lockfile = fopen( $lockfilename,"w");
if (flock($lockfile, LOCK_EX)) {
    $out = exec($cmd, $exec_out);

    if ($debug) { 
        // print_r($out . ': ' . implode(' ', $exec_out));
        chmod($path, 0666); 
    }

    flock($lockfile, LOCK_UN); // unlock the file
    fclose($lockfile);
    
    if ($mode=='show') {
        $im = file_get_contents($path); 
        header('Content-Type: image/jpeg'); 
        echo $im;
    }
    if (!$mode=='save') { unlink($path); }

} else {
    // flock() returned false, no lock obtained
    fclose($flockfile);
    error_log("Could not lock $lockfilename!");
}




?>