exec startlxde
#exec /usr/bin/irxevent -d /etc/lirc/lircrc 1>/var/log/irxevent.out 2>/var/log/irxevent.err
start-stop-daemon --start --quiet --oknodo --exec /usr/bin/env DISPLAY=:0 /usr/bin/irxevent -- -d /etc/lirc/lircrc < /dev/null
