#sudo apt-get install libdirectfb-1.7-bin libdirectfb-1.7-system-egl libdirectfb-1.7-gfxdriver-gles2 libdirectfb-1.7-wm-default libdirectfb-1.7-wm-sawman
#sudo wget -O /lib/modules/3.6.11+/kernel/fusion.ko "http://directfb.org/raspbian/fusion.ko"
#sudo wget -O /lib/modules/3.6.11+/kernel/linux-one.ko "http://directfb.org/raspbian/linux-one.ko"
#sudo insmod fusion.ko
#sudo insmod linux-one.ko
#sudo chmod 666 /dev/fusion* /dev/one* /dev/input/* /dev/snd/* /dev/vchiq /dev/tty*

sudo apt-get install ca-certificates
sudo apt-get install git-core
sudo wget http://goo.gl/1BOfJ -O /usr/bin/rpi-update && sudo chmod +x /usr/bin/rpi-update
sudo rpi-update
sudo apt-get install lighttpd

sudo apt-get install git
sudo apt-get install pastebincl
sudo apt-get install vim
sudo apt-get install wpasupplicant 
sudo apt-get install rasberrypi-bootloader
sudo apt-get install raspberrypi-bootloader
sudo apt-get install linux-source-3.6
sudo apt-get install linux-source
sudo apt-get install linux-headers
sudo apt-get install linux-source linux-headers-3.6-trunk-rpi
sudo apt-get install linux-source-3.6 linux-headers-3.6-trunk-rpi
sudo apt-get install linux-source-3.6
sudo apt-get install automake
sudo apt-get install automake g++
sudo apt-get update && sudo apt-get upgrade
sudo apt-get install unclutter
sudo apt-get upgrade
sudo apt-get install gstreamer
sudo apt-get install gstreamer-tools
sudo apt-get install gstreamer0.10-plugins-bad 
sudo apt-get install gstreamer0.10-plugins-good
