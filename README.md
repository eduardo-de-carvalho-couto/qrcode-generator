# Bem vindo(a) ao projeto QR Code Generator

Neste projeto é gerado um QR code que redireciona o usuario para um  business card.

## Para rodar o projeto, utilize o laravel sail:

Antes de começar, isso aqui pode ajudar
```
alias php='docker run --rm -u "$(id -u):$(id -g)" -v $(pwd):/var/www/html -w /var/www/html php php'
```
```
alias composer='docker run --rm -u "$(id -u):$(id -g)" -v $(pwd):/var/www/html -w /var/www/html composer composer'
```

1. Clone o repositório
```
git clone https://github.com/eduardo-de-carvalho-couto/qrcode-generator
```
2. Dê require do laravel sail
```
composer require laravel/sail --dev
```
3. Instale o laravel sail
```
php artisan sail:install
```
4. Suba o ambiente com o laravel sail
```.
/vendor/bin/sail up
```
Qualquer dúvida, consulte a documentação do laravel:
https://laravel.com/docs/9.x/sail#installing-sail-into-existing-applications