### Readme

задание.
Описание задания:

Создайте приложение Symfony для получения данных из общедоступного API, сохраните их в реляционной базе данных и интегрируйте Sonata Admin Bundle для администрирования бэк-офиса в течение 3-дневного срока. База данных должна включать несколько таблиц с соответствующими связями.

Требования:

Приложение Symfony:
- Настройте новое приложение Symfony.
- Настройте свой проект Symfony.

API-интеграция:
- Выберите общедоступный API (например, погода, новости, пользователи).
- Используйте Symfony для получения данных из API.
- Обрабатывать поиск данных и возможные ошибки.

Проектирование базы данных:
- Создать реляционную базу данных (MySQL).
- Разработайте схему своей базы данных для хранения данных API с несколькими таблицами и связями.

Интеграция администратора Sonata:
- Интегрируйте Sonata Admin Bundle для администрирования бэк-офиса.
- Создание интерфейсов администратора для управления данными, хранящимися в базе данных.

Команда CLI:
- Внедрите консольную команду Symfony для запуска извлечения и хранения данных.

Репозиторий GitHub:
- Загрузите свое приложение Symfony в репозиторий GitHub с именем «test».
- Поделитесь URL-адресом репозитория.

Дополнительные рекомендации:
- Используйте инструменты и библиотеки Symfony.
- Пишите чистый, организованный код, следуя лучшим практикам.
- Грамотно обрабатывать ошибки.
- Используйте контроль версий и делитесь своим кодом через репозиторий.
- Поделитесь инструкциями по запуску приложения.
- Это задание оценивает вашу способность интегрировать API, проектировать базы данных и создавать приложения Symfony.

Это задание должно быть выполнено в течение 5-дневного срока и оценивает вашу способность интегрировать API, проектировать базы данных, создавать приложения Symfony и расширять их с помощью Sonata Admin для функциональности бэк-офиса. Удачи!

Сылки которые использовались.
1.https://symfony.com/doc/4.4/index.html - основная информация для симфони(как создать и связать с database, admin)
2.https://symfony.com/doc/current/doctrine.html - как создается Databases and the Doctrine ORM
3. https://symfony.com/doc/4.4/setup.html#symfony-packs - как создается и устанавливается Symfony Framework
4. https://symfony.com/doc/4.4/page_creation.html - тест для создания первой страницы ( понятия как работает а точней как понимает симфони комады и в какие папки как entity controller i Repository )
5. https://stackoverflow.com/questions/66626974/symfony-5-an-exception-occurred-in-driver-could-not-find-driver ( сылка для решения проблемы подключения database комманда symfony console doctrine:database:create)
5.1 https://stackoverflow.com/questions/52138206/cant-create-database-with-symfony-4-1-could-not-find-driver - доп сылка
5.2 https://github.com/symfony/symfony/discussions/47057 - тоже доп сылка 
6. https://copyprogramming.com/howto/symfony-an-exception-occurred-in-driver-could-not-find-driver#google_vignette -сылка для решения проблемы с драйверами для симфони mysql
7. https://stackoverflow.com/questions/63920975/trying-to-link-symfony-to-mysql - сылка для понятия связки Symfony и MysQl
7.1 https://stackoverflow.com/questions/65854482/impossible-to-connect-my-symfony-5-app-with-mysql-postgresql-is-forced -доп сылка 
8. https://stackoverflow.com/questions/6803265/how-to-install-php-extension-locally-on-wamp - сылка для установки wamp extencion php
9. https://symfony.com/bundles/SonataAdminBundle/current/getting_started/installation.html#download-the-bundle - сылка для установки SonataAdminBundle
10. https://docs.sonata-project.org/projects/SonataDoctrineORMAdminBundle/en/4.x/reference/installation/ -сылка для создания и изменения админки 
10.1 https://medium.com/@kunicmarko20/sonata-admin-custom-page-61b99d4bd9d4 - доп сылка 
11. https://symfony.com/bundles/SonataAdminBundle/current/getting_started/creating_an_admin.html - создание админки 
12. https://symfony.com/bundles/SonataAdminBundle/current/index.html - Admin Bundle
13. https://jsonformatter.curiousconcept.com/# - переводчик для упрашеного чтения (если нету доп extancion для кода )
14. https://openweathermap.org/api - апи которые использовался в проекте 
15. https://symfony.com/doc/current/http_client.html - http создание клента 



В данном проекте как виртуальный сервер использовалось wampserver  