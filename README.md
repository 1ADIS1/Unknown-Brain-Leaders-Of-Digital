# Unknown Brain Leaders Of Digital

Решение команды Unknown Brain кейса Росатом по преобразованию записи совещания в протокол.


# Установка

Для запуска решения вам необходимо установить модуль **Speech Recognition** и модель для распознования речи **Pocketsphinx**.

**( 1 )** Для начала скачайте **SWIG** для запуска Pocketshpinx: https://sourceforge.net/projects/swig/files/

![SWIG download](https://user-images.githubusercontent.com/60191045/130214177-2d974851-04f4-45a9-8367-2c62b8c299aa.png)

**( 2 )** Далее вам необходимо распаковать архив в любую директорию. Скопируйте ваш путь к SWIG, для меня он выглядел так:

![image](https://user-images.githubusercontent.com/60191045/130214477-0494da9f-d481-4dc2-b509-3b40aa720850.png)

**( 3 )** Далее переходим в поиск Windows и пишем следующее: **Изменение системных переменных среды**

![image](https://user-images.githubusercontent.com/60191045/130216025-affaddac-d6c1-4e81-a5a1-1e5fbf6e4567.png)

**( 4 )** В открывшемся окне выбираем **Переменные среды**, далее во второй вкладке **Системные переменные** двойным нажатием открываем переменную **Path**

![image](https://user-images.githubusercontent.com/60191045/130216472-6bd392d4-acd8-4cfb-b266-0e6404cc6a21.png)

**( 5 )** В окне **Изменить переменную среды** выбираем **Создать** и указываем путь к нашему SWIG

![image](https://user-images.githubusercontent.com/60191045/130216707-825d3202-d66e-41d3-a58f-44ca2767df22.png)

**FINAL** Отлично, теперь проверяем установку SWIG и устанавливаем Speech Recognition

![image](https://user-images.githubusercontent.com/60191045/130216881-40cef4f7-5fcd-46a9-80da-109f83aa4e1e.png)

