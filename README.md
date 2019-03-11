# api-post
API REST desenvolvida usando CodeIgniter

É possível executar o projeto, após a instalação do PHP, usando o servidor embutido. Dentro da pasta do projeto, executar o comando no terminal: php -S localhost:8085 (ou qualquer porta liberada para usar).

Utilizei Composer para gerar o projeto em CodeIgniter.

A API desenvolvida possui três rotas:
1. GET http://localhost:8085/posts/1 - retorna uma matriz com código HTTP, mensagem e dados de um único post, identificado pelo id.
2. GET http://localhost:8085/posts - retorna uma matriz com código HTTP, mensagem e dados de todos os posts.
3. POST http://localhost:8085/posts/newpost - seria a rota de novo post.

O arquivo principal do projeto, responsável pelas rotas, é o controller Post.php, que se encontra na pasta application/controllers.
