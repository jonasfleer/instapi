sudo apt-get install libdirectfb-1.7-bin libdirectfb-1.7-system-egl libdirectfb-1.7-gfxdriver-gles2 libdirectfb-1.7-wm-default libdirectfb-1.7-wm-sawman
sudo wget -O /lib/modules/3.6.11+/kernel/fusion.ko "http://directfb.org/raspbian/fusion.ko"
sudo wget -O /lib/modules/3.6.11+/kernel/linux-one.ko "http://directfb.org/raspbian/linux-one.ko"
sudo insmod fusion.ko
sudo insmod linux-one.ko
sudo chmod 666 /dev/fusion* /dev/one* /dev/input/* /dev/snd/* /dev/vchiq /dev/tty*
