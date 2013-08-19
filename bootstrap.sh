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

sudo apt-get install php5-common php5-cgi php5 php5-mysql
sudo lighty-enable-mod fastcgi-php
sudo service lighttpd force-reload
sudo chown www-data:www-data /var/www
sudo chmod 775 /var/www
sudo usermod -a -G www-data pi

# chown nobody:nobody smarty/templates_c
# chown nobody:nobody smarty/cache
# chmod 775 smarty/templates_c
# chmod 775 smarty/cache

#1 sudo apt-get install libjpeg8-dev
#1 sudo apt-get install imagemagick
#1 sudo apt-get install libv4l-dev
#1 cd /usr/include/linux
#1 sudo ln -s ../libv4l1-videodev.h videodev.h
#1 cd -
#1 wget "http://downloads.sourceforge.net/project/mjpg-streamer/mjpg-streamer/Sourcecode/mjpg-streamer-r63.tar.gz"
#1 tar xvzf mjpg-streamer-r63.tar.gz
#1 cd mjpg-streamer-r63
#1 make
#1 sudo cp input_* output_* /usr/local/lib/
#1 sudo cp mjpg_streamer /usr/local/bin/

#2 sudo apt-get install subversion libv4l-dev libjpeg8-dev imagemagick
#2 cd /tmp 
#2 svn co https://mjpg-streamer.svn.sourceforge.net/svnroot/mjpg-streamer mjpg-streamer
#2 cd mjpg-streamer/mjpg-streamer
#2 make USE_LIBV4L2=true clean all
#2 make DESTDIR=/usr install
echo "lirc_rpi gpio_in_pin=18" | sudo tee -a /etc/modules
sudo apt-get install lirc
sudo rm -fr /etc/lirc
sudo ln -s /home/pi/instapi/system/etc/lirc /etc/lirc
sudo rm /etc/init.d/lirc
sudo ln -s /home/pi/instapi/system/etc/init.d/lirc /etc/init.d/lirc
sudo apt-get install lirc-x
#sudo apt-get install xautomation

mkdir /tmp/stream
