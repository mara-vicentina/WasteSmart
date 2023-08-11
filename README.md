Obs: Este projeto utiliza o composer, se ele não estiver instalado é preciso fazer a sua instalação antes de rodar o próximo passo
É só acessar o link abaixo e fazer a instalação 
    https://getcomposer.org/


Passo 1: Para configurações iniciais do projeto utilize o comando 
    composer install

Passo 2: Para conectar ao seu banco de dados é só copiar o arquivo .env.exemple e renomear para .env e fazer a conexão na linha 11 até 16
colocando sua connection, seu host, o nome do database, seu username e sua password. 
Assim como no exemplo abaixo:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=connected_city
    DB_USERNAME=root
    DB_PASSWORD=''

Passo 3: Utilize o comando abaixo para criação das tabelas e colunas no banco de dados configurado
    php artisan migrate 
