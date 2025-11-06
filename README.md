-----------------------------
O foco deste projeto foi a criação de um CRUD completo para a entidade "Orçamentos" no painel administrativo.

    Create: Formulário para criação de novos orçamentos, com seleção dinâmica de clientes vindos do banco.

    Read: Listagem de todos os orçamentos, exibindo o nome do cliente e a descrição do tipo de serviço.

    Update: Formulário de alteração que carrega os dados atuais do orçamento e permite sua modificação.

    Delete: Funcionalidade para exclusão de registros de orçamento.
-----------------------------

Script para o banco de dados:

    CREATE DATABASE IF NOT EXISTS projeto1
    DEFAULT CHARACTER SET utf8mb4
    DEFAULT COLLATE utf8mb4_general_ci;
    
    USE projeto1;
    
    CREATE TABLE clientes (
      id INT AUTO_INCREMENT PRIMARY KEY,
      cliente VARCHAR(150) NOT NULL,
      cidade VARCHAR(100),
      estado VARCHAR(50)
    );
    
    CREATE TABLE orcamento (
      id INT AUTO_INCREMENT PRIMARY KEY,
      cliente_id INT,
      valor DECIMAL(10, 2) NOT NULL,
      tipo INT NOT NULL,
      
      FOREIGN KEY (cliente_id) REFERENCES clientes(id)
    );
