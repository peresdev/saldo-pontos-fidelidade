# Saldo de pontos de fidelidade
Projeto para realizar a consulta de saldo de pontos de fidelidade via REST API.

![Demonstração](imgs/demonstracao.gif?raw=true "Demonstração")

# Tecnologias utilizadas
- PHP
- CodeIgniter Web Framework
- REST API
- MySQL
- Framework CSS Bulma (https://bulma.io)
- jQuery

# Banco de dados - MySQL
1. Criar base de dados
```sql
CREATE DATABASE saldo_de_pontos;
```
2. Usar a base criada
```sql
USE saldo_de_pontos;
```
3. Criar tabelas
```sql
CREATE TABLE `saldo_de_pontos`.`cliente` (
  `cliente_id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  `numero_documento` VARCHAR(45) NULL,
  PRIMARY KEY (`cliente_id`));

CREATE TABLE `saldo_de_pontos`.`saldo` (
  `saldo_id` INT NOT NULL AUTO_INCREMENT,
  `saldo_disponivel_dinheiro` DOUBLE NULL,
  `pontos` DOUBLE NULL,
  `cliente_id` INT NULL,
  PRIMARY KEY (`saldo_id`),
  CONSTRAINT `cliente_id_fk`
    FOREIGN KEY (`saldo_id`)
    REFERENCES `saldo_de_pontos`.`cliente` (`cliente_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `saldo_de_pontos`.`integracao` ( `integracao_id` INT NOT NULL AUTO_INCREMENT , 
  `chave` VARCHAR(40) NOT NULL , `codigo_loja` INT NOT NULL , `codigo_cartao` BIGINT NOT NULL , PRIMARY KEY (`integracao_id`)) ENGINE = InnoDB;

CREATE TABLE `saldo_de_pontos`.`log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `data_solicitacao` datetime DEFAULT NULL,
  `retorno` longtext,
  `nsu` varchar(40) NOT NULL
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
```
4. Inserir dados
```sql
INSERT INTO cliente (nome, numero_documento) values ('Leandro Peres' , '123456789');
INSERT INTO cliente (nome, numero_documento) values ('Sergio' , '111111111');
INSERT INTO cliente (nome, numero_documento) values ('Joana' , '222222222');

INSERT INTO saldo (saldo_disponivel_dinheiro, pontos, cliente_id) values (50.0, 20, 1);
INSERT INTO saldo (saldo_disponivel_dinheiro, pontos, cliente_id) values (100.0, 40, 2);
INSERT INTO saldo (saldo_disponivel_dinheiro, pontos, cliente_id) values (150.0, 60, 3);

INSERT INTO integracao (chave, codigo_loja, codigo_cartao) values ("4B335B6F-9C4D-47F7-B798-C46FFBC4881A", 1, 32231126850);
```

# Consumir API
- Credenciais API


Chave: 4B335B6F-9C4D-47F7-B798-C46FFBC4881A

Código Loja: 1

Código Cartão: 32231126850 

- Endpoint API


api/ConsultaFidelizacao

# Utilizar interface visual
- Número de documento
Utilizar 123456789, 111111111 ou 222222222.

# Possíveis melhorias
- Cadastro de clientes;
- Possibilidade de criação de chave via painel administrativo para desenvolvedores consumir a API;
- Testes Unitários.

# Autor
Leandro Peres Gonçalves