# mini-crudClass

***

O mini-crudClass é uma pequena classe em PHP para manipulação de registros de bancos de dados.
Ele utiliza PDO para conexão, permitindo ser usado com várias plataformas de banco de dados.

Caso encontre (e certamente encontrará) problemas nas linhas do projeto,
sinta-se a vontade para entrar em contato e sugerir uma melhoria no código.



## Como usar

O arquivo da classe é tão pequeno que dispensa explicações de uso, mas irei listar os métodos e seus parâmetros.


### Método conectar()
Tipo: Privado <br />
Parâmetros: Nenhum <br />
Info: Usado apenas dentro da classe, para fazer a conexão com o banco de dados.



### Método inserir(_array $campos, $tabela_)
Tipo: Público<br />
Parâmetros: $campos, $tabela.<br />
  **$campos**: Do tipo array, onde a chave é o nome da coluna do bd e o respectivo valor é a informação a ser inserida.<br />
    Exemplo: `array("nome" => "João", "sobrenome" => "da Silva");`<br />
  **$tabela**: Tabela do bd para o qual deseja inserir as informações.<br />



### Método consultar(_array $select, $tabela, $where = null, $order = null, $limit = null_)
Tipo: Público<br />
Parâmetros: $select, $tabela, $where, $order, $limit.<br />
  **$select**: Do tipo array, que recebe os campos do bd que quer retornar na consulta.<br />
    Exemplo 1: `array("nome", "sobrenome");`<br />
    Exemplo 2: `array("*");`<br />
  **$tabela**: Tabela do bd a qual deseja realizar a consulta.<br />
  **$where**: Do tipo string de valor padrão null. Filtra a consulta.<br />
    Exemplo: `"id=87";`<br />
  **$order**: Do tipo string de valor padrão null. Ordena os resultados da consulta.<br />
    Exemplo: `"nome DESC";`<br />
  **$limit**: Do tipo string de valor padrão null. Limita a quantidade de registros retornados na consulta.<br />
    Exemplo 1: `"3";`<br />
    Exemplo 2: `"2, 8";`<br />



### Método deletar(_$tabela, $where_);
Tipo: Público<br />
Parâmetros: $tabela, $where.<br />
  **$tabela**: Tabela da qual deseja selecionar o registro para deletar.<br />
  **$where**: Do tipo string. Seleciona o(s) registro(s) a ser(em) deletado(s).<br />
    Exemplo: `"nome='Joao' AND sobrenome='da silva'";`<br />




### Método atualizar(_$tabela, array $set, $where_);
Tipo: Público<br />
Parâmetros: $tabela, $set, $where.<br />
  **$tabela**: Tabela do bd para atualizar o registro.<br />
  **$set**: Do tipo array. A chave do array corresponde a coluna, e o valor respectivo corresponde aos dados atualizados.<br />
    Exemplo: `array("nome" => "Marcos", "sobrenome" => "de Oliveira");`<br />
  **$where**: Seleciona o registro para qual deseja atualizar os dados.<br />
    Exemplo: `"id=8";`<br />




***

## Autor
**Rômulo Guimarães**

## Contato
**romulo1984@gmail.com**