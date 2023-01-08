# DigitalMaps

A DigitalMaps é uma empresa especializada na produção de receptores GPS. A organização está empenhada em lançar um dispositivo que promete auxiliar pessoas na “localização de pontos de interesse”, e você será o responsável pela criação da solução!

## Solução proposta

O framework Laravel foi escolhido por sua facilidade e produtividade na de lidar com APIs REST, facilitando o trabalho com rotas e acesso ao banco de dados por exemplo. A versão do php usada é a 8.1, que é a versão mais estável com suporte ativo. Como banco de dados o Mysql.

## Dependências
Para o setup do projeto é necessário ter [Docker](https://www.docker.com/products/docker-desktop/) instalado, (caso seu sistema operacional seja Windows é necessário o [WSL](https://learn.microsoft.com/en-us/windows/wsl/install) também). 

O ambiente foi criado usando a ferramente  [Laravel Sail](https://laravel.com/docs/9.x/sail) (como ponto de partida) que é um pacote que provem uma interfce para interação com o docker. Sua instalção possui um `docker-compose.yml` com alguns containers como `mysql/php-fpm` ja configuradas.

### Iniciando e finalizando os containers via Sail

Para iniciar os container usamos o comando:

```
./vendor/bin/sail up -d
```

Para finalizar os container usamos o comando:

```
./vendor/bin/down
```
### comandos do composer

Para realizar os comandos do composer (dentro do container) de maneira simples montamos o comando dessa maneira:

```
 sail composer dump-autoload
```

### comandos do artisan

Para realizar os comandos artisan do Laravel monstamos o comando de maneira semelhante aos do composer:

```
sail artisan migrate
```

## Setup

Após a instalação das dependências, vamos fazer mais alguns passos.

É necessário copiar o `.env.example` para um `.env` com suas configurações de banco de dados. (caso queira mudar as configurações do bando de dados, basta alterar no .env, e se for mudar o nome também no `./docker/8.1/create-database.sh`  que é um script que cria o banco quando o container é criado)

Ao criar o cantainers existe um script que criar o bando de dados `digitalmaps`, caso aconteça algum problema e o banco não seja criado, basta criar entrado no container do mysql e fazer manualmente:

``` bash
docker exec -it {CONTAINER_ID} bash
```

``` bash
mysql -u root -p
```

``` sql
CREATE DATABASE digitalmaps;
```

Depois basta dar os comando para instalar as dependências do php

``` bash
sail composer install
```
