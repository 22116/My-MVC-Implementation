# Quiz api
Clear php project with csharp form client side
## Instalation
1. Upload project files to your system and allow redirection
2. Open `configuration.ini` and fill database section with yours params
(example you can find in `configuration.example.ini`)
3. Execute this commands in root directory of the project to update database schema
```
composer install
vendor/bin/doctrine orm:schema-tool:update --force --dump-sql
```
## Client
Look https://github.com/22116/quiz_client
