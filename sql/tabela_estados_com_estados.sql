USE emporioa_desenvolvimento;

CREATE  TABLE IF NOT EXISTS estado (
  uf CHAR(2) NOT NULL,
  nome VARCHAR(40) NOT NULL ,
  codigo int(7) NOT NULL ,
  PRIMARY KEY (uf) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

INSERT INTO estado (nome, uf, codigo) VALUES ('Acre', 'AC', '12');
INSERT INTO estado (nome, uf, codigo) VALUES ('Alagoas', 'AL', '27');
INSERT INTO estado (nome, uf, codigo) VALUES ('Amapá', 'AP', '16');
INSERT INTO estado (nome, uf, codigo) VALUES ('Amazonas', 'AM', '13');
INSERT INTO estado (nome, uf, codigo) VALUES ('Bahia', 'BA', '29');
INSERT INTO estado (nome, uf, codigo) VALUES ('Ceará', 'CE', '23');
INSERT INTO estado (nome, uf, codigo) VALUES ('Distrito Federal', 'DF', '53');
INSERT INTO estado (nome, uf, codigo) VALUES ('Espírito Santo', 'ES', '32');
INSERT INTO estado (nome, uf, codigo) VALUES ('Goiás', 'GO', '52');
INSERT INTO estado (nome, uf, codigo) VALUES ('Maranhão', 'MA', '21');
INSERT INTO estado (nome, uf, codigo) VALUES ('Mato Grosso do Sul', 'MS', '50');
INSERT INTO estado (nome, uf, codigo) VALUES ('Mato Grosso', 'MT', '51');
INSERT INTO estado (nome, uf, codigo) VALUES ('Minas Gerais', 'MG', '31');
INSERT INTO estado (nome, uf, codigo) VALUES ('Paraná', 'PR', '41');
INSERT INTO estado (nome, uf, codigo) VALUES ('Paraíba', 'PB', '25');
INSERT INTO estado (nome, uf, codigo) VALUES ('Pará', 'PA', '15');
INSERT INTO estado (nome, uf, codigo) VALUES ('Pernambuco', 'PE', '26');
INSERT INTO estado (nome, uf, codigo) VALUES ('Piauí', 'PI', '22');
INSERT INTO estado (nome, uf, codigo) VALUES ('Rio de Janeiro', 'RJ', '33');
INSERT INTO estado (nome, uf, codigo) VALUES ('Rio Grande do Norte', 'RN', '24');
INSERT INTO estado (nome, uf, codigo) VALUES ('Rio Grande do Sul', 'RS', '43');
INSERT INTO estado (nome, uf, codigo) VALUES ('Rondônia', 'RO', '11');
INSERT INTO estado (nome, uf, codigo) VALUES ('Roraima', 'RR', '14');
INSERT INTO estado (nome, uf, codigo) VALUES ('Santa Catarina', 'SC', '42');
INSERT INTO estado (nome, uf, codigo) VALUES ('Sergipe', 'SE', '28');
INSERT INTO estado (nome, uf, codigo) VALUES ('São Paulo', 'SP', '35');
INSERT INTO estado (nome, uf, codigo) VALUES ('Tocantins', 'TO', '17');