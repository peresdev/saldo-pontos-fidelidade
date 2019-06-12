CREATE DATABASE saldo_de_pontos;

CREATE TABLE `saldo_de_pontos`.`cliente` (
  `cliente_id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NULL,
  `numero_documento` VARCHAR(45) NULL,
  PRIMARY KEY (`cliente_id`));

INSERT INTO cliente (nome, numero_documento) values ('Leandro Peres' , '123456789');
INSERT INTO cliente (nome, numero_documento) values ('Sergio' , '111111111');
INSERT INTO cliente (nome, numero_documento) values ('Joana' , '222222222');

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

INSERT INTO saldo (saldo_disponivel_dinheiro, pontos, cliente_id) values (50.0, 20, 1);
INSERT INTO saldo (saldo_disponivel_dinheiro, pontos, cliente_id) values (100.0, 40, 2);
INSERT INTO saldo (saldo_disponivel_dinheiro, pontos, cliente_id) values (150.0, 60, 3);

CREATE TABLE `saldo_de_pontos`.`log` (
  `log_id` INT NOT NULL,
  `data_solicitacao` DATETIME NULL,
  `retorno` JSON NULL,
  PRIMARY KEY (`log_id`));

