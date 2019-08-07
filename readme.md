Database
-------------------
Create database.
~~~
CREATE DATABASE `yii2_crmapp` DEFAULT CHARACTER SET UTF8 DEFAULT COLLATE UTF8_UNICODE_CI;
~~~
Run migrations.
~~~
php yii migrate
~~~
Be sure that mysql is using, if not, change manually `create_rbac_tables` migration.
~~~
@yii/rbac/migrations/schema-mysql.sql
~~~
Create dump of scheme.
~~~
mysqldump -u root -p -d yii2_crmapp > tests/_data/dump.sql
~~~

Tests
-------------------
Alias for path of tests. Work with POSIX cmd (or terminal like `bash`).
~~~
$ alias cept="./vendor/bin/codecept"
~~~
Create subfolders for tests and necessary tree of configuration files.
~~~
$ cept bootstrap
~~~
Generate acceptance Tester classes.
~~~
$ cept generate:cept acceptance SmokeTest
$ cept generate:test functional PasswordHashing
~~~
Generate subclasses of Tester classes.
~~~
$ cept generate:stepobject acceptance CRМOperatorSteps
~~~
Run tests.
~~~
$ cept run
$ cept run acceptance
$ cept run tests/acceptance/DocumentationCept.php
~~~
Rebuild of Codeception.
~~~
$ cept build
~~~