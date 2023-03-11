# Template Mercadin Wordpress

Um repositório do projeto Mercadin, trabalho do Projeto Integrador, feito em Wordpress.

## Plugins incluidos

* Advanced Custom Fields
* Contact Form 7
* Flamingo
* Duplicate post
* Post Types Order e Taxonomy Terms Order
* Simple History
* WEBP Converter for Media
* WP Fastest Cache
* WP Mail SMTP

## Tecnologias do tema
* Sass
* Bootstrap
* jQuery
* Laravel-Mix

## Instalação do template
1. Clone o projeto na pasta htdocs 

2. Crie o banco de dados para o projeto

3. Importe o dump inicial do template (`_dumps/mercadin.sql`) para esse banco

4. Ajuste o `site_url` e a `home_url` na tabela `snts_options` inserindo a rota do projeto " http://localhost/exemple "

5. Configure o arquivo `/wp-config.php` usando o `/wp-config-sample.php` como base

7. Acesse o painel admin com o user `su.wp` e a senha `554655`

8. Ative o tema, pois ele é desativado após renomear a pasta

9. Crie um novo usuário para o projeto, faça login nele e delete o `su.wp`

10. Salve os links permanentes na aba Configurações

1. Configure as informações do site na aba Configurações