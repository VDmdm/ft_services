#!/bin/sh
rc default
#rc-service influxdb start
#influx < /tmp/influx
#rc-service influxdb stop
influxd -config /etc/influxdb.conf