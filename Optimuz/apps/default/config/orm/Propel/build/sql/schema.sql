
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- alternativa
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `alternativa`;

CREATE TABLE `alternativa`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`pergunta_id` int(10) unsigned NOT NULL,
	`texto` VARCHAR(500),
	`posicao` INTEGER,
	PRIMARY KEY (`id`),
	BTREE INDEX `fk_pergunta_alternativa_idx` (`pergunta_id`),
	CONSTRAINT `fk_pergunta_alternativa`
		FOREIGN KEY (`pergunta_id`)
		REFERENCES `pergunta` (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- auditoria
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `auditoria`;

CREATE TABLE `auditoria`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`usuario_id` int(10) unsigned,
	`mensagem` VARCHAR(175) NOT NULL,
	`observacao` TEXT,
	`data` DATETIME NOT NULL,
	`nivel` int(1) unsigned NOT NULL,
	`ip` VARCHAR(15),
	`tipo` int(1) unsigned,
	`registro_id` int(10) unsigned,
	PRIMARY KEY (`id`),
	BTREE INDEX `auditoria_usuario_idx` (`usuario_id`),
	CONSTRAINT `FK_auditoria_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- avaliacao_resposta_forum
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `avaliacao_resposta_forum`;

CREATE TABLE `avaliacao_resposta_forum`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`usuario_id` int(10) unsigned NOT NULL,
	`resposta_forum_id` int(10) unsigned NOT NULL,
	`data_avaliacao` DATE,
	`nota` enum('1','2','3','4','5'),
	PRIMARY KEY (`id`),
	BTREE INDEX `fk_avaliacao_resposta_forum_usuario_idx` (`usuario_id`),
	BTREE INDEX `fk_avaliacao_resposta_forum_resposta_forum_idx` (`resposta_forum_id`),
	CONSTRAINT `fk_avaliacao_resposta_forum_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`),
	CONSTRAINT `fk_avaliacao_resposta_forum_resposta_forum`
		FOREIGN KEY (`resposta_forum_id`)
		REFERENCES `resposta_forum` (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- cargo
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cargo`;

CREATE TABLE `cargo`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- cargo_pesquisa
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cargo_pesquisa`;

CREATE TABLE `cargo_pesquisa`
(
	`cargo_id` int(10) unsigned NOT NULL,
	`pesquisa_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`cargo_id`,`pesquisa_id`),
	BTREE INDEX `fk_cargo_pesquisa_pesquisa_idx` (`pesquisa_id`),
	CONSTRAINT `fk_cargo_pesquisa_pesquisa`
		FOREIGN KEY (`pesquisa_id`)
		REFERENCES `pesquisa` (`id`),
	CONSTRAINT `fk_cargo_pesquisa_cargo`
		FOREIGN KEY (`cargo_id`)
		REFERENCES `cargo` (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- categoria
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(150) NOT NULL,
	`posicao` INTEGER NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- coleta_pesquisa
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `coleta_pesquisa`;

CREATE TABLE `coleta_pesquisa`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`usuario_id` int(10) unsigned NOT NULL,
	`pesquisa_id` int(10) unsigned NOT NULL,
	`data_criacao` DATE,
	PRIMARY KEY (`id`),
	BTREE INDEX `fk_coleta_pesquisa_pesquisa_idx` (`pesquisa_id`),
	BTREE INDEX `fk_coleta_pesquisa_usuario_idx` (`usuario_id`),
	CONSTRAINT `fk_coleta_pesquisa_pesquisa`
		FOREIGN KEY (`pesquisa_id`)
		REFERENCES `pesquisa` (`id`),
	CONSTRAINT `fk_coleta_pesquisa_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- comentario_noticia
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `comentario_noticia`;

CREATE TABLE `comentario_noticia`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`noticia_id` int(10) unsigned NOT NULL,
	`usuario_id` int(10) unsigned NOT NULL,
	`descricao` VARCHAR(500),
	`data_comentario` DATETIME NOT NULL,
	PRIMARY KEY (`id`),
	BTREE INDEX `fk_comentario_noticia_noticia_idx` (`noticia_id`),
	BTREE INDEX `fk_comentario_noticia_usuario_idx` (`usuario_id`),
	CONSTRAINT `fk_comentario_noticia_noticia`
		FOREIGN KEY (`noticia_id`)
		REFERENCES `noticia` (`id`),
	CONSTRAINT `fk_comentario_noticia_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- curtida_forum
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `curtida_forum`;

CREATE TABLE `curtida_forum`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`usuario_id` int(10) unsigned NOT NULL,
	`forum_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FI_curtida_forum_usuario` (`usuario_id`),
	INDEX `FI_curtida_forum_forum` (`forum_id`),
	CONSTRAINT `fk_curtida_forum_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`),
	CONSTRAINT `fk_curtida_forum_forum`
		FOREIGN KEY (`forum_id`)
		REFERENCES `forum` (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- departamento
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `departamento`;

CREATE TABLE `departamento`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- departamento_pesquisa
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `departamento_pesquisa`;

CREATE TABLE `departamento_pesquisa`
(
	`departamento_id` int(10) unsigned NOT NULL,
	`pesquisa_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`departamento_id`,`pesquisa_id`),
	BTREE INDEX `fk_departamento_pesquisa_pesquisa_idx` (`pesquisa_id`),
	CONSTRAINT `fk_departamento_pesquisa_pesquisa`
		FOREIGN KEY (`pesquisa_id`)
		REFERENCES `pesquisa` (`id`),
	CONSTRAINT `fk_departamento_pesquisa_departamento`
		FOREIGN KEY (`departamento_id`)
		REFERENCES `departamento` (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- endereco
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `endereco`;

CREATE TABLE `endereco`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`cidade_id` int(10) unsigned,
	`logradouro` VARCHAR(200),
	`bairro` VARCHAR(45),
	`cep` VARCHAR(8),
	`numero` VARCHAR(5),
	`complemento` VARCHAR(175),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- forum
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `forum`;

CREATE TABLE `forum`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`usuario_id` INTEGER,
	`titulo` VARCHAR(255),
	`topico` TEXT,
	`data_cricacao` DATETIME,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- noticia
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `noticia`;

CREATE TABLE `noticia`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`usuario_id` int(10) unsigned,
	`tema` VARCHAR(100),
	`titulo` VARCHAR(255),
	`sub_titulo` TEXT,
	`descricao` TEXT,
	`data_cadastro` DATETIME,
	`visualizacao` INTEGER DEFAULT 0,
	PRIMARY KEY (`id`),
	BTREE INDEX `fk_noticia_usuario_idx` (`usuario_id`),
	CONSTRAINT `fk_noticia_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- perfil
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `perfil`;

CREATE TABLE `perfil`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(45) NOT NULL,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- perfil_permissao
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `perfil_permissao`;

CREATE TABLE `perfil_permissao`
(
	`perfil_id` int(10) unsigned NOT NULL,
	`permissao_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`perfil_id`,`permissao_id`),
	BTREE INDEX `fk_perfil_permissao_permissao_idx` (`permissao_id`),
	CONSTRAINT `fk_perfil_permissao_perfil`
		FOREIGN KEY (`perfil_id`)
		REFERENCES `perfil` (`id`),
	CONSTRAINT `fk_perfil_permissao_permissao`
		FOREIGN KEY (`permissao_id`)
		REFERENCES `permissao` (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- pergunta
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `pergunta`;

CREATE TABLE `pergunta`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`pesquisa_id` int(10) unsigned NOT NULL,
	`categoria_id` int(10) unsigned,
	`texto` VARCHAR(500),
	`tipo_resposta` INTEGER,
	`posicao` INTEGER,
	`obrigatoria` TINYINT(1) DEFAULT 1,
	`excecao` INTEGER(2) DEFAULT 0,
	`gatilho_excecao` int(11) unsigned,
	`pergunta_mae_id` int(11) unsigned,
	PRIMARY KEY (`id`),
	BTREE INDEX `fk_pergunta_pesquisa_idx` (`pesquisa_id`),
	BTREE INDEX `fk_pergunta_categoria_idx` (`categoria_id`),
	CONSTRAINT `fk_pergunta_pesquisa`
		FOREIGN KEY (`pesquisa_id`)
		REFERENCES `pesquisa` (`id`),
	CONSTRAINT `fk_pergunta_categoria`
		FOREIGN KEY (`categoria_id`)
		REFERENCES `categoria` (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- permissao
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `permissao`;

CREATE TABLE `permissao`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`nome` VARCHAR(60) NOT NULL,
	`slug` VARCHAR(60) NOT NULL,
	`descricao` VARCHAR(200),
	PRIMARY KEY (`id`),
	UNIQUE INDEX `slug_UNIQUE` (`slug`),
	UNIQUE INDEX `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- pesquisa
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `pesquisa`;

CREATE TABLE `pesquisa`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`criador_id` int(10) unsigned NOT NULL,
	`titulo` VARCHAR(200),
	`descricao` TEXT,
	`data_criacao` DATETIME,
	`data_inicio` DATE,
	`data_fim` DATE,
	`ativo` TINYINT(1) DEFAULT 1,
	`publicada` TINYINT(1) DEFAULT 0,
	`tipo_pesquisa` enum('E','L'),
	`anonima` TINYINT(1),
	`idade_inicial` INTEGER,
	`idade_final` INTEGER,
	`genero` enum('M','F','T'),
	`quantidade_pontos` INTEGER,
	PRIMARY KEY (`id`),
	BTREE INDEX `pesquisa_autor_idx` (`criador_id`),
	CONSTRAINT `pesquisa_criador`
		FOREIGN KEY (`criador_id`)
		REFERENCES `usuario` (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- pesquisa_habilitada
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `pesquisa_habilitada`;

CREATE TABLE `pesquisa_habilitada`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`pesquisa_id` int(10) unsigned NOT NULL,
	`usuario_id` int(10) unsigned NOT NULL,
	`respondida` TINYINT DEFAULT 0,
	PRIMARY KEY (`id`),
	BTREE INDEX `fk_pesquisa_habilitada_pesquisa_idx` (`pesquisa_id`),
	BTREE INDEX `fk_pesquisa_habilitada_usuario_idx` (`usuario_id`),
	CONSTRAINT `fk_pesquisa_habilitada_pesquisa`
		FOREIGN KEY (`pesquisa_id`)
		REFERENCES `pesquisa` (`id`),
	CONSTRAINT `fk_pesquisa_habilitada_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- premio
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `premio`;

CREATE TABLE `premio`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`usuario_id` int(10) unsigned NOT NULL,
	`nome` VARCHAR(255),
	`valor` INTEGER,
	`quantidade` INTEGER,
	PRIMARY KEY (`id`),
	BTREE INDEX `fk_premio_usuario_idx` (`usuario_id`),
	CONSTRAINT `fk_premio_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- resposta
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `resposta`;

CREATE TABLE `resposta`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`coleta_pesquisa_id` int(10) unsigned NOT NULL,
	`pergunta_id` int(10) unsigned NOT NULL,
	`alternativa_id` int(10) unsigned,
	`texto` VARCHAR(500),
	PRIMARY KEY (`id`),
	BTREE INDEX `fk_resposta_alternativa_idx` (`alternativa_id`),
	BTREE INDEX `fk_resposta_coleta_pesquisa_idx` (`coleta_pesquisa_id`),
	BTREE INDEX `fk_resposta_pergunta_idx` (`pergunta_id`),
	CONSTRAINT `fk_resposta_opcao_escolhida`
		FOREIGN KEY (`alternativa_id`)
		REFERENCES `alternativa` (`id`),
	CONSTRAINT `fk_resposta_formulario`
		FOREIGN KEY (`coleta_pesquisa_id`)
		REFERENCES `coleta_pesquisa` (`id`),
	CONSTRAINT `fk_resposta_pergunta`
		FOREIGN KEY (`pergunta_id`)
		REFERENCES `pergunta` (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- resposta_forum
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `resposta_forum`;

CREATE TABLE `resposta_forum`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`forum_id` int(10) unsigned NOT NULL,
	`usuario_id` int(10) unsigned NOT NULL,
	`data_resposta` DATETIME,
	`descricao` VARCHAR(355),
	PRIMARY KEY (`id`),
	BTREE INDEX `fk_resposta_forum_usuario_idx` (`usuario_id`),
	BTREE INDEX `fk_resposta_forum_forum_idx` (`forum_id`),
	CONSTRAINT `fk_resposta_forum_usuario`
		FOREIGN KEY (`usuario_id`)
		REFERENCES `usuario` (`id`),
	CONSTRAINT `fk_resposta_forum_forum`
		FOREIGN KEY (`forum_id`)
		REFERENCES `forum` (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- solicitacao_resgate
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `solicitacao_resgate`;

CREATE TABLE `solicitacao_resgate`
(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`solicitante_id` int(10) unsigned NOT NULL,
	`aprovador_id` int(10) unsigned,
	`premio_id` int(10) unsigned NOT NULL,
	`data_solicitacao` VARCHAR(45) NOT NULL,
	`aprovada` TINYINT(1) DEFAULT 0 NOT NULL,
	PRIMARY KEY (`id`),
	BTREE INDEX `fk_solicitacao_resgate_usuario_idx` (`solicitante_id`),
	BTREE INDEX `fk_solicitacao_resgate_premio_idx` (`premio_id`),
	BTREE INDEX `fk_solicitacao_resgate_aprovador_idx` (`aprovador_id`),
	CONSTRAINT `fk_solicitacao_resgate_solicitante`
		FOREIGN KEY (`solicitante_id`)
		REFERENCES `usuario` (`id`),
	CONSTRAINT `fk_solicitacao_resgate_premio`
		FOREIGN KEY (`premio_id`)
		REFERENCES `premio` (`id`),
	CONSTRAINT `fk_solicitacao_resgate_aprovador`
		FOREIGN KEY (`aprovador_id`)
		REFERENCES `usuario` (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- usuario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario`
(
	`id` int(10) unsigned NOT NULL,
	`perfil_id` int(10) unsigned NOT NULL,
	`endereco_id` int(10) unsigned,
	`cargo_id` int(10) unsigned,
	`departamento_id` int(10) unsigned,
	`matricula` VARCHAR(55),
	`nome` VARCHAR(200) NOT NULL,
	`email` VARCHAR(200) NOT NULL,
	`cpf` VARCHAR(11),
	`data_nascimento` DATE,
	`data_contratacao` DATE,
	`celular` VARCHAR(11),
	`telefone` VARCHAR(11),
	`token` CHAR(64),
	`usuario` VARCHAR(255) NOT NULL,
	`senha` CHAR(128) NOT NULL,
	`token_senha` CHAR(64),
	`token_firebase` VARCHAR(255) NOT NULL,
	`data_rescisao` DATE,
	`ativo` TINYINT(1) DEFAULT 1 NOT NULL,
	`tipo_acesso` enum('M','B'),
	`estado_civil` enum('C','S','V','D'),
	PRIMARY KEY (`id`),
	UNIQUE INDEX `email_UNIQUE` (`email`),
	UNIQUE INDEX `usuario_UNIQUE` (`usuario`),
	UNIQUE INDEX `token_UNIQUE` (`token`),
	UNIQUE INDEX `token_senha_UNIQUE` (`token_senha`),
	BTREE INDEX `FK_usuario_perfil_idx` (`perfil_id`),
	BTREE INDEX `fk_usuario_endereco_idx` (`endereco_id`),
	BTREE INDEX `fk_usuario_idx` (`departamento_id`),
	BTREE INDEX `fk_usuario_cargo_idx` (`cargo_id`),
	CONSTRAINT `fk_usuario_cargo`
		FOREIGN KEY (`cargo_id`)
		REFERENCES `cargo` (`id`),
	CONSTRAINT `fk_usuario_departamento`
		FOREIGN KEY (`departamento_id`)
		REFERENCES `departamento` (`id`),
	CONSTRAINT `fk_usuario_endereco`
		FOREIGN KEY (`endereco_id`)
		REFERENCES `endereco` (`id`),
	CONSTRAINT `FK_usuario_perfil`
		FOREIGN KEY (`perfil_id`)
		REFERENCES `perfil` (`id`)
) ENGINE=InnoDB CHECKSUM='';

-- ---------------------------------------------------------------------
-- valor_ponto_avaliacao_forum
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `valor_ponto_avaliacao_forum`;

CREATE TABLE `valor_ponto_avaliacao_forum`
(
	`id` INTEGER NOT NULL,
	`nota` VARCHAR(45),
	`valor` VARCHAR(45),
	PRIMARY KEY (`id`)
) ENGINE=InnoDB CHECKSUM='';

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
