
# E-commerce

Projeto que tenta simular um E-commerce


## Deployment

Para rodar o projeto, inicie o prompt de comando na raiz do mesmo e então instrua o seguinte comando:

```bash
  docker-compose up -d
```

Recomendo, por enquanto, que use o php-server do VsCode (ou similar) para subir o servidor com qualquer página do projeto.

## Issues

O fato de ser necessário o uso do php-server, e não o web-server que vem com o docker-compose, se deve pelo `PDOExeption` que é retornado no servidor web.