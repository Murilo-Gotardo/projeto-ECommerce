
# E-commerce

Projeto que tenta simular um E-commerce


## Deployment

Para rodar o projeto, inicie o pronpt de comando na raiz do mesmo e então instrua o seguinte comando 

```bash
  docker-compose up -d
```

Recomendo, por enquanto, que use o php-server do VsCode (ou similar) para subir o servidor com qualquer pagina do projeto

## Issues

O fato de ser necessario o uso do php-server, e nao o web-server que vem com o docker-compose, se deve pelo `PDOExeption` que é retornado no servidor web