# TesteSATC

Teste para vaga de estágio SATC.

Índice:

Pasta Exercicio1 : Contém o material da questão 1. 
Pasta Exercicio2 : Contem os materiais da questão 2. 
Pasta Banco : Contém o arquivo .sql do banco de dados.

Instruções:

Importar o arquivo .sql da pasta "Banco" para o phpMyAdmin ou o MySQL Workbench. 
Colocar as pastas "Exercicio1" e "Exercicio2" na pasta de arquivos do webserver utilizado. Exemplo: "www" do EasyPHP ou "htdocs" do XAMPP. 
Abrir o Exercicio1 pelo link : http://localhost/Exercicio1 e abrir o arquivo "multiplos.php". 
Abrir o Exercicio2 pelo link : http://localhost/Exercicio2 e abrir o arquivo "index.html" caso não seja aberto automaticamente. 
A partir do index é possível acessar todos os outros arquivos com os requisitos do teste.

Observações:

A exclusão é feita pelo código(ID) pois é o único campo único da tabela, logo, geraria conflito caso tentasse excluir por outro campo. 
A data e hora é colocada automaticamente após a inserção do e-mail e pode ser verificada ao alterar o e-mail, porém não editável. 
A busca antes da alteração é também feita pelo código(ID), pois, como citado anteriormente, é o único campo único da tabela. 
É feita uma busca antes da alteração para confirmar a existência do e-mail que deseja alterar.
