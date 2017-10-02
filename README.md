# Grade de Programação
[![license](https://img.shields.io/github/license/tvufg/grade.svg?)](https://github.com/tvufg/grade/blob/master/LICENSE)
[![GitHub (pre-)release](https://img.shields.io/github/release/tvufg/grade/all.svg)](https://github.com/tvufg/grade/releases/)

Sistema gerenciador da grade de programação da TV UFG

## Instruções de Implantação

Para implantar o sistema você terá que que criar algumas pastas e arquivos que não estão contidos na realise por serem conteúdos internos e ou com copyright, esses arquivos estão listados no [.gitignore](https://github.com/tvufg/grade/blob/master/.gitignore).

São eles:
* **db.class.php**: Arquivo responsável pela conexão com o banco de dados. Você pode encontrar um template para esse arquivo na pasta docs, cujo nome é [db.class-template.php](https://github.com/tvufg/grade/blob/master/docs/db.class-template.php "Template para db.class.php").
* **valida-acesso.php**: Arquivo responsável por validar as informações de login do usuário para conceção de acesso ao sistema.
* **sair.php**: Arquivo responsável por realizar logout do usuário.
* **imagens_capa/**: Pasta contendo as imagens que são utilizada como capa do programa.
* **imagens_destaque/**: Pasta contendo as imagens que são utilizada como destaque (imagem maior) do programa.
* **pdf/**: Pasta contendo os arquivos PDF com a grade de programação de cada dia.

Use a estrutura abaixo como guia para localização desses arquivos e pastar no projeto:

```
grade
├── CHANGELOG.md
├── CODE_OF_CONDUCT.md
├── CONTRIBUTING.md
├── LICENSE
├── PULL_REQUEST_TEMPLATE.md
├── README.md
├── admin
│   ├── assets
│   ├── CustomFileInputs
│   ├── image-picker
│   ├── db.class.php
│   ├── valida-acesso.php
│   ├── sair.php
│   └── Demais arquivos PHP
├── docs
│   └── Documentação e arquivos de exemplo
├── imagens
├── imagens_capa
├── imagens_destaque
├── pdf
├── programacao
│   ├── assets
│   ├── db.class.php
│   └── Demais arquivos PHP
└── grade.sql
```

Observações:
* O arquivo ```grade.sql```, é um exemplo, não muito bom, de como estão organizadas as tabelas no banco de dados.
* A utilização de padrões arquiteturais, como **MVC**, e paradigmas, como **OO**, na construção do sistema não foram adotados devido a ausência de um projeto do sistema e limitações técnicas.

## Exemplos

São imagens do layout das principais páginas do sistema.

### Página de login

![login-page](https://github.com/tvufg/grade/blob/master/docs/login-page.png "LOGIN-PAGE")

### Dashboard

![dashboard](https://github.com/tvufg/grade/blob/master/docs/dashboard.png "DASHBOARD")

### Galeria de Imagens

![gallery](https://github.com/tvufg/grade/blob/master/docs/gallery.png "GALLERY")

### Página do usuário

Pode ser visualizada pelo link http://tvufg.org.br/grade/programacao/

![user-page](https://github.com/tvufg/grade/blob/master/docs/user-page.png "USER-PAGE")

## Licença

[MIT](https://github.com/tvufg/grade/blob/master/LICENSE)
