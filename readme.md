# Template Mercadin Wordpress

Um repositório do projeto Mercadin, trabalho do Projeto Integrador, feito em Wordpress.

## Plugins incluidos

* Advanced Custom Fields
* Contact Form 7
* Recaptcha para Contact Form 7
* Flamingo
* Barra de aceitação de Cookies (GDPR Cookie Consent)
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
* Vue
* Laravel-Mix

## Instalação do template

1Inicialize o repositório do projeto

2.Crie o banco de dados para o projeto

3.Crie um vhost na sua máquina

4. Importe o dump inicial do template (`_dumps/mercadin.sql`) para esse banco

5. Ajuste o `site_url` e a `home_url` na tabela `snts_options` inserindo a vhost criada

6. Configure o arquivo `/wp-config.php` usando o `/wp-config-sample.php` como base

7. Renomeie a pasta do tema para o nome do projeto

8. Acesse o painel admin com o user `su.wp` e a senha `554655`

9. Ative o tema, pois ele é desativado após renomear a pasta

10. Crie um novo usuário para o projeto, faça login nele e delete o `su.wp`

11. Salve os links permanentes

12. Configure as informações do site na aba Configurações

13. Entre na pasta tema (cd wp-content/themes/mercadin) 
    13.1. Execute `npm i` na pasta do tema

14. Configure o arquivo `webpack.mix.js` na pasta do tema inserindo o vhost no campo proxy do browserSync

15. Execute `npm run watch` na pasta do tema

## Publicação por tags

1. Verificar se todas as alterações já foram commitadas e enviadas para a master

2. Baixar todas as tags do repositório: `git fetch --tags`

3. Criar um branch com o nome da próxima versão (exemplo: `git checkout -b v0.0.1`)

4. Executar a build de produção na pasta do tema: `npm run prod`

5. Remover as linhas `/assets/css/*` e `/assets/js/*` do arquivo `.gitignore` na pasta do tema

 5.1. (`git status -u` exibe todos os arquivos não trackeados pelo git, aqui devem aparecer os arquivos css e js)

6. Adicionar e commitar os arquivos compilados neste branch `git add .` e `git commit -m "Add assets compilados"`

7. Criar a tag com o nome da versão `git tag -a v0.0.1 -m ""`

8. Fazer push da tag: `git push --tags`

9. `git checkout master` para sair desse branch criado, os arquivos css e js serão apagados e o gitignore voltará ao normal
