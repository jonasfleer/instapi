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
$savedir = '/tmp/instapi_www_temp';
if (!is_dir($savedir)) {
    mkdir($savedir);
}
$width = empty($_GET['w']) ? '320' : $_GET['w'];
$height = empty($_GET['h']) ? '240' : $_GET['h'];
$quality = empty($_GET['q']) ? '10' : $_GET['q'];
$showImage = !empty($_GET['show']);

if ($showImage) {
    $path = $savedir . '/' . uniqid() . '.jpg';
} else {
    $path = $savedir . '/preview.jpg';
}

$exec_out = array();
$cmd = 'raspistill -t 0 -e jpg -n -w '.$width.' -h '.$height.' -q '.$quality.' -o ' . $path;
//syslog(LOG_INFO, 'instapi exec: ' . $cmd);
$out = exec($cmd, $exec_out);
// print_r($out . ': ' . implode(' ', $exec_out));
// chmod($path, 0666);

if ($showImage) {
    $im = file_get_contents($path); 
    header('Content-Type: image/jpeg'); 
    echo $im;
}

unlink($path);



?>