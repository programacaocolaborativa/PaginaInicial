# ProColab

Projeto de programação colaborativa

## Iniciando

Instruções para instalar a arquitetura inicial de aplicações futuras, segue abaixo requisitos mínimos e configurações para rodar a aplicação.

### Pré Requisitos

Para conseguir rodar a aplicação, será necessário **PHP 7.1** instalado, e deixar como Document Root o arquivo index.php dentro da pasta public. Sugiro em ambiente de desenvolvimento, usar o servidor embutido do php.

```
php -S localhost:8000 -t public public/index.php
```

### Instalando Dependências

Depois da aplicação rodando com Document Root na **public/index.php**, rodar o composer para instalação das dependencias.
Navegue até a pasta raíz da aplicação em seu terminal, e...

```
composer install
```

Depois de instalar as dependencias, acessar via browser:

```
localhost:8000/
```

## instalando ou criando templates

Usamos o template engine [TWIG](https://twig.sensiolabs.org/) para desenvolvemiento frontend, os arquivos, devem ser colocados dentro da pasta **templates/**,
e suas dependencias como arquivos js e css, dentro das pastas **public/assets/js** e **public/assets/css/** respectivamente. Pode-se usar arquivos em um CDN se achar conveniente,
frameworks de todos os níveis e tipos.

## Cursos recomendados

* [GIT/GITHUB](https://www.schoolofnet.com/curso-git-e-github/) - Curso gratuito de git/github
* [COMPOSER](https://www.webdevbr.com.br/composer-na-pratica) - Curso gratuito Composer

## Contribuindo

Para contribuir ao projeto, primeiro deve ser membro do grupo do whatsapp **Programação Colaborativa**,  caso não seja, os pull requests não serão aprovados.
Caso já seja membro, faça um fork do projeto para seu github, e clone-o para sua estação de trabalho.
estude a arquitetura caso seja desenvolvedor back end, caso seja front end e queira colaborar com template, ajuste, melhorias de ux, criação de novas telas, fique a vontade, commite para o seu repositório, acesse o github e faça um pull request para o repositório do projeto, 
você será solicitado para esclarecer dúvidas quanto as alterações caso seja necessário.

## Autores

Lista de contribuidores deste projeto.

* **Kelver Machado Vargas** - *Arquitetura Inicial* - [Kelver](https://github.com/kelver)

## Licença


