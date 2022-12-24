
# E-commerce

Projeto que tenta simular um E-commerce


## Rode localmente

Clone o projeto

```bash
  git clone https://github.com/Murilo-Gotardo/projeto-ECommerce
```

Vá para o diretorio do projeto

```bash
  cd projeto-ECommerce
```

Inicie o docker-compose

```bash
  docker-compose up -d
```

Inicie o servidor

Recomendo, por enquanto, que use o php-server do VsCode (ou similar) para subir o servidor com qualquer página do projeto.


## Issues

O fato de ser necessário o uso do php-server, e não o web-server que vem com o docker-compose, se deve pelo `PDOExeption` que é retornado no servidor web.