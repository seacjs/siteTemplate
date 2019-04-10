Настройка нового репозитория
------------
Только для тех кто шарит в чем тут дело. Это не инструкция а просто памятка. Переходи к следующему разделу.

Задать <site_name> 
~~~
/vagrant/nginx/app.conf
/vagrant/config/vagrant-local.yml
/Vagrantfile
~~~

Задать <site_db_name>
~~~
/vagrant/provision/once-as-root.sh
~~~
Настроить 
~~~
/config/db.php
~~~


Установка и настройка
------------

### 1. Клонировать проект

~~~
git clone https://github.com/seacjs/siteTemplate.git
~~~

### 2 Установить vagrant


Frontend шпаргалка
------------

### Сокращенный синтаксис PHP

- Php код заключен в след конструкции:
~~~
<?php somePhpCodeHere ?>
~~~

- Вывод информации:
~~~
<?= $someInfo ?>
<?php echo $someInfo ?>
~~~

- Объект и свойства 
~~~
$object->property
~~~

- if else
~~~
<?php if(): ?>
...
<?php else: ?>
...
<?php endif ?>
~~~

- foreach
~~~
<?php foreach($array as $key => $value): ?>
...
<?php endforeach ?>
~~~

### Картинки

- Обращение к главной картинке объекта
~~~
$object->image
~~~

- Получение картинок объекта
~~~
$object->images
~~~

- Свойства объекта картинки
~~~
$image->url

$image->urlThumbnail

$image->alt

$image->title
~~~

- Пример, как это использовать:
~~~
<img src="<?= $service->image->url ?>" title="<?=$service->image->title ?>" width="...">
~~~


Тестовые данные
-------

- Сайт будет доступен по следующей ссылке

~~~
http://sitename
~~~



Дополнительно
-------------------

### Image not found

Если картинка не найдена, используются следующие картинки для отображения:

~~~
images/image_not_found.jpg
images/image_not_found_thumbnail.jpg
~~~

