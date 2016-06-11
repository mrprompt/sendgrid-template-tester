# SendGrid Template Tester

[![Build Status](https://travis-ci.org/mrprompt/sendgrid-template-tester.svg?branch=master)](https://travis-ci.org/mrprompt/sendgrid-template-tester)

Uma forma simples de testar seus templates do SendGrid

### Instalação

Basta criar o arquivo .env no diretório da aplicação, com o conteúdo:

```
SENDGRID_API_TOKEN="meu-token-do-sendgrid"
```

### Uso

```
$ php console.php template:test 'template-id' 'email-de-destino' 'email-de-origem' 'tag1nome:tag1valor' 'tag2nome:tag2valor' '...'
```
