### Описание
##### Апи сервис для нужд двухфакторной авторизации, восстановления пароля, делает следующие вещи:

 - генерирует числовой / буквенно числовой код различной длины с указанным сроком действия, по истечению которого - код не валиден

 - проверять соответствие кода, переданного от пользователя, с кодом который мы сгенерировали

 - принудительная инвалидация кода, до истечения срока действия 

/generate

/check

/invalidate

### Как использовать
##### Для быстрого запуска сервиса необходимо наличие Docker и docker-compose
```
$ docker -v
Docker version 18.06.0-ce, build 0ffa825
```
```
$ docker-compose -v
docker-compose version 1.17.0, build ac53b73
```

##### Команды для управления сервисом
* Install all needed dependencies for service **`make install`**

* Start service with command **`make start`**

* Show ip for access service **`make ip`**, and call with received ip and port 7777,

    for example: `http://172.17.0.2:7777/`

* Stop service **`make stop`**