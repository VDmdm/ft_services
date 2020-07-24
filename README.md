# ft_services

Проект в рамках обучения в школе 21 (school 42).

В рамках проекта была создан кластер k8 со следующими сервисами:
- nginx (redirect 301 to 443; ssh server)
- wordpress (несколько пользователей доступных сразу после старта)
- mysql (сохранение базы данных при рестарте/выключении сервиса)
- influxdb (условия как у mysql)
- grafana (создание dashboard для каждого контейнера)
- telegraf (сбор метрик через docker input plugin, отправка их в influxdb)
- phpmyadmin
- ftps-сервер
- k8 web dashboard

Основные требования:
1. Сборка собственных образов на основании alpine linux.
2. Доступ к кластеру только через loadbalancer (без использования NodePort, port-forvard, expose). В качестве LB - Metallb.
3. Сохранение работоспособности сервисов (их перезапуск) при сбое и намеренном выключении.
4. Открыть доступ только к wordpress, pma, grafana, nginx, ftps (остальные службы внутри кластера). У каждого сервиса свой IP и порт.

Проект выполнен полностью. Итоговая оценка 100/100.
