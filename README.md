# Laravel API - Share Your Codes
[Página principal](https://github.com/jaum1234/share-your-codes)

## Endpoints
/api/*

### Projetos
- GET: /projetos 
- GET: /projetos/id 
- POST: /projetos 
- PUT: /projetos/id 
- DELETE: /projetos/id 

### Usuário
- POST: /login 
- GET: /logout 
- POST: /register
- GET: /refreshtoken
- PUT: /users/id/projetos

## Status Code
- 200: Ok
- 201: Created

- 400: Bad request
- 401: Unautorized

## Design Patterns e boas práticas
Em vez de utilizar FormRequests para validar os dados recebidos nas requisiçoes, optei como criar meus próprios validadores, e um Desing Pattern muito útil para evitar a repetiçao de código foi o [Template Method](https://refactoring.guru/design-patterns/template-method). Para entender melhor a implementaçao, olhe o diretório **app/Service/Validadores**.

Para fins de aprendizagem e experimentaçao, o [Princípio da Responsabilidade Única](https://www.devmedia.com.br/arquitetura-o-principio-da-responsabilidade-unica/18700) foi aplicado a risca em todos os controllers, separando-os segundo o CRUD (criaçao, leitura, atualizaçao e remoçao). Além disso, também busquei fazer uso do [Princípio da Inversao de Dependencia](https://dev.to/lucascavalcante/principios-solid-o-que-sao-e-como-aplica-los-no-php-laravel-parte-05-inversao-de-dependencia-3o6e).

## Autenticaçao
A autenticaçao dos usuários foi realizada com [JWT Token](https://jwt.io/). De modo a agilizar o processo, a implementaçao foi feita utilizando o pacote [jwt-auth](https://github.com/tymondesigns/jwt-auth), do Tymondesings.
Todas as configuraçoes relativas ao token se encontram em **config/jwt.php**.

## Testes automatizados
Até o momento, os testes sao todos a nível de aplicaçao. A Laravel oferece muitas ferramentas para esse tipo de teste, tendo como base o [PHPUnit](https://phpunit.readthedocs.io/en/9.5/). Testa-se tanto os endpoints relativos aos usuários, quanto aos projetos. 

