Database config
-------------------
1 Creating database
~~~
CREATE DATABASE `yii_crmapp` DEFAULT CHARACTER SET UTF8 DEFAULT COLLATE UTF8_UNICODE_CI;
~~~
2 Run migrations
~~~
php yii migrate
~~~

Алиас для полного пути (РОSIХ cmd вроде bash)
* `$ alias cept="./vendor/bin/codecept"`

Создание подкаталога tests и дерево требуемых конфигурационх файлов
* `$ cept bootstrap`

Приёмочный тест-заглушка
* `$ cept generate:cept acceptance SmokeTest`

Запуск тестов
* `$ cept run`

Пересбор среды Codeception
* `$ cept build`

Команда в Codeception, которая автоматически генерирует подклассы разных классов Tester.
* `$ cept generate:stepobject acceptance CRМOperatorSteps`