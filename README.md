# Unknown Brain Leaders Of Digital

Решение команды Unknown Brain кейса Росатом по преобразованию записи совещания в протокол.

# Установка

В качестве каркаса использована CMS CS-Cart, сейчас всё установлено здесь http://185.233.37.254/

Для развертывания веб сервиса необходим установленный веб-сервер Git, Apache2 со включенным mod_rewrite, MySQL Server, PHP 7.1-7.4

**( 1 )** После установки, настройки веб-сервера и создания базы данных перейдите в корневую директорию веб сервера и выполните следующую команду:
apt update && apt install php-imagick php-gd php-mbstring php-iconv php-mysqli curl php-culr php-sockets php-soap php-xml php-zip && git init && git remote add origin https://github.com/1ADIS1/Unknown-Brain-Leaders-Of-Digital.git && git pull origin master

**( 2 )** Далее открываем файл local_conf.php, заменяем данные базы данных, вписываем хост\домен и если есть подпапку проекта

**( 3 )** Выполняем команду mysql -uusername -ppassword -hlocalhost db_name < dump.sql где заменяем username, password и db_name на соответствующие значения.

**( 4 )** Выполняем команду php db_install.php

**Готово!**