**Реализованная функциональность:**

+ Веб-приложение на базе CS-Cart;
+ Загрузка записи совещания на сервер;
+ Получение документа с ключевыми фразами: "Что сделали/приняли/вынесли";
+ Полная стенограмма совещания;

**Особенность проекта в следующем:**

+ Возможность редактирования протокола;
+ Добавление новых шаблонов документов;
+ Высокая скорость конвертирования; # ?
+ Мультиязычность;
+ Минимализирован шанс речевой ошибки при конвертировании файла; # ?

**Основной стек технологий:**

+ PHP, MySQL, jQuery, XML
+ HTML, CSS, JavaScript
+ Git, Linux
+ Ajax
+ Smarty
+ Apache HTTP Server
+ CS-Cart
+ Tensorflow, Keras, Pandas

**Демо:**

Демо сервиса доступно по адресу: http://rosatom.cs-coding.com/


# Среда запуска:

1. Развертывание сервиса производится на debian-like linux (Ubuntu 20.04);
2. Требуется установленный web-сервер с поддержкой PHP(версия 7.4+) интерпретации и включенным mod_rewrite (Apache2);
3. Требуется установленная СУБД MySQL (версия 8+);
4. Требуется установленный Git

# База данных

Необходимо создать пустую базу данных

~~~
mysql -uroot -proot
CREATE DATABASE rosatom;
quit
~~~

# Развертывание проекта

В качестве каркаса использована CMS CS-Cart.

**( 1 )** После установки, настройки веб-сервера и создания базы данных перейдите в корневую директорию веб сервера и выполните следующую команду:
~~~
apt update && apt upgrade && apt install php-imagick php-gd php-mbstring php-iconv php-mysqli curl php-curl php-sockets php-soap php-xml php-zip && git init && git remote add origin https://github.com/1ADIS1/Unknown-Brain-Leaders-Of-Digital.git && git pull origin master
~~~

**( 2 )** Далее открываем файл local_conf.php, заменяем данные базы данных, вписываем хост\домен и если есть подпапку проекта.

**( 3 )** Выполняем миграции командой mysql -uusername -ppassword -hlocalhost rosatom < dump.sql где заменяем username, password и db_name на соответствующие значения.

**( 4 )** Выполняем команду php db_install.php

РАЗРАБОТЧИКИ
