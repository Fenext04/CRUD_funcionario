# Teste Fullstack Novakio

## Tecnologias
<table>
    <tr>
        <td>
            <a href="https://laravel.com/docs/8.x"><img src="/public/icons/laravel.png" /></a>
        </td>
        <td>
            <a href="https://getbootstrap.com/docs/5.2/getting-started/introduction/"><img src="/public/icons/bootstrap.png" /></a>
        </td>
    </tr>
</table> 


## Requisitos
1. PHP 7.4
2. Laravel 8
3. Mysql 5.7




## Instalação

1. Clonar o repositório
2. Execute `composer install`
3. Copie o `.env.example` para `.env`
4. Crie um banco de dados chamado `funcionarios_CRUD` com o charset `utf8mb4_unicode_ci`
5. Execute os comandos: `php artisan key:generate` , `php artisan migrate` e `php artisan db:seed --class=SetorSeeder` para popular o banco de dados com os setores
6. Execute `php artisan serve` e o projeto será executado na porta http://localhost:8000





