# Primeiras considerações

API RESTfull desenvolvida como teste de conhecimento. Tecnologias envolvidas: PHP 8x, Laravel 8, JWT, Migrations, Seeders, MySql e ORM eloquent, além das boas práticas. Você pode clonar esse repositório e seguir os passos para testá-la, avaliá-la ou melhorá-la.

- Antes de iniciarmos, seria interessante estar bem familiarizado com as tecnologias supracitadas;

- Também é importante que os comandos oriundos do PHP estejam a nível global do Sistema Operacional (setar variável de ambiente "PATH" do sistema com o endereço do PHP no HD);

- Deletei todos os comandos do " .gitignore " para resguardar seu tempo de procurar pacotes. Não será preciso nenhuma configuração senão no banco de dados MySql, que será bem simples e intuitivo

## Preparando ambiente

- __1.__ Clone esse repositório e o abra em seu editor de texto preferido, caso queira;

- __2.__ Crie um Banco de dados MySql com o nome "teste_incubatech". Exatamente dessa forma;

- __3.__ Navegue até o arquivo " .env " na raíz do projeto. Lá você pode alterar o nome do banco(DB_DATABASE), do usuário(DB_USERNAME) e a senha de acesso(DB_PASSWORD). O primeiro é opcional, os demais fica ao seu critério;

- __4.__ Navegue até a raíz do projeto com seu terminal (CMD, PowerShell, etc);

- __5.__ Execute o comando: 
>php artisan migrate

- __6.__ Em seguida, execute o comando: 
>php artisan db:seed

- __7.__ Por fim, execute o comando: 
>php artisan serve

### Justificativas

- O comando do item 5 executa as Migrations, que por sua vez criam as tabelas. É importante que esse seja o primeiro passo depois de criar o Banco de Dados;
- O comando do item 6 executa as Seeders, que por sua vez criam registros para as tabelas. É importante que esse seja o primeiro passo depois de criar as tabelas via Migrations;
- O comando do item 7 executa o servidor HTTP embutido do laravel. Apesar de ser possível utilizar outros Servidores Web, recomendo que faça como dito.

## Ideias do projeto

__A estrutura tem como foco simular um sistema de compras, onde existem as entidades Categoria, produto, pedido e cliente. As migrations se encarregam de criar as tabelas, enquanto as Seeders se encarregam de povoar as entidades Categoria e produto. Pedido e cliente são de responsabilidade do manipulador da API__

__Como o foco do teste não é a modelagem, o banco de dados ficou na estrutura mais simples possível, onde o cliente só consegue pedir um produto a compra__

# Manipulando a API

### Rotas

### Obtendo acesso
- Para iniciar, devemos cadaastrar um novo usuário/cliente na seguinte __rota__ POST:
>localhost:8000/api/client

Nessa rota, deve ser passados dados em formulario com os nomes "name_client", "phone_client", "email", "password", "cep", sendo esse último o responsável de preencher o endereço do cliente a partir da API BrasilAPI. 

- Em seguida, podemos fazer o login manualmente com os dados cadastrados. Para tanto, é preciso passar dados em formulario com os nomes "email" e "password". A __ROTA__ é do tipo POST:
>localhost:8000/api/login

Logo após logar com sucesso, a API retornará um token de acesso. Copie-o, pois será fundamental para acessar as rotas restritas.

### Manipulando as Rotas restritas

Para trabalhar com as rotas retritas, depois de logado, recomendo que use softwares de simulação clientHttp, como o Insomnia ou o Postman.

### Cliente

Antes de fazer as requisições para as rotas, lembre de abrir a aba __AUTH__, de __Autenticação__, do softwre de requisições escolhido. O tipo de __TOKEN__ deve ser Bearer Token. Apenas cole o Token no local apropriado e implemente as rotas.

- __Rota GET__. Espera-se que retorne todos os cliente e seus dados cadastrados, no formato JSON;
>localhost:8000/api/client

- __Rota GET__, __parametrizada__. Espera-se que retorne o cliente especificado pelo id na forma de parametro, no formato JSON;
>localhost:8000/api/client/{id}

- __Rota PUT__. Espera-se que os campos colocados sejam iguais aos dos campos do FORM da rota POST, com adições dos campos "city_client", "state_client", "street_client" e "neighborhood_client" da tabela, passando  o ID de identificação do registro por parâmetro. Se tudo der certo, será retornado o JSON dos dados __atualizados__ no cadastrado e o Status Code competente;
>localhost:8000/api/client/{id}

__PS: Se a API de CEP não conseguir localizar sua rua e bairro, devido as políticas geográficas brasileiras, pode-se colocar esses dados nesse END-POINT de atualização__

- __Rota DELETE__. Espera-se que seja passado o ID de identificação do registro. Quando deletar um registro de cliente, todos os pedidos que tenham Foreign Key atribuída a esse registro serão deletados. Se tudo der certo, será retornado uma mensagem informando que o registro foi excluído. Você pode conferir se realmente foi excluído o registro utilizando a rota GET acima;
>localhost:8000/api/client/{id}

### Pedido

Antes de fazer as requisições para as rotas, lembre de abrir a aba __AUTH__, de __Autenticação__, do softwre de requisições escolhido. O tipo de __TOKEN__ deve ser Bearer Token. Apenas cole o Token no local apropriado e implemente as rotas.

- __Rota GET__. Espera-se que retorne todas os pedidos efetuados, no formato JSON;
>localhost:8000/api/order

- __Rota GET__, __parametrizada__. Espera-se que retorne o pedido especificado pelo ID na forma de parametro, no formato JSON;
>localhost:8000/api/order/{id}

- __Rota POST__. Espera-se que os dados colocados sejam iguais aos dos campos da tabela ("price_total_order", "status_order", "id_product_fk" e "id_client_fk", sendo os dois últimos as Foreign Keys para relaconar produto com cliente). Se tudo der certo, será retornado o JSON dos dados cadastrados e o Status Code competente;
>localhost:8000/api/order

- __Rota PUT__. Espera-se que os dados colocados sejam iguais aos dos campos da tabela ("price_total_order", "status_order", no caso) e que seja passado o ID de identificação do registro. Se tudo der certo, será retornado o JSON dos dados __atualizados__ no cadastrado e o Status Code competente;
>localhost:8000/api/order/{id}

- __Rota DELETE__. Espera-se que seja passado o ID de identificação do registro. Se tudo der certo, será retornado uma mensagem informando que o registro foi excluído. Você pode conferir se realmente foi excluído o registro utilizando a rota GET;
>localhost:8000/api/order/{id}

- Em seguida, podemos fazer o logout. Para tanto, é preciso acesar o seguinte END-POINT com o BEARER TOKEN sendo enviado no cabeçalho da requisição. A __ROTA__ é do tipo POST:
>localhost:8000/api/logout