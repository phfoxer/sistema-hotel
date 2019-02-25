
# Aplicações
Foi utilizado nesse projeto:
 [Angular CLI](https://angular.io/guide/quickstart) version 7.0.3.
 [Laravel](https://laravel.com/docs/5.7#installing-laravel) version 5.7
  
## Ambiente de teste
É necessário seguir as etapas de instalação dos frameworks laravel (php) e Angular (Typescript)  para que a aplicação funcione sem erros.

## Comandos adicionais

Após configurar a base de dados (postgres ou mysql) no arquivo .env do projeto de api execute os seguintes scripts na linha de comando `php artisan migrate && php artisan db:seed --class=PrecosTableSeeder` para configurar o ambiente de testes
