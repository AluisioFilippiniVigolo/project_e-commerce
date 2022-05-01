﻿CREATE TABLE TFORNECEDOR (
  FORCOD SERIAL NOT NULL,
  FORNOME VARCHAR(50) NOT NULL,
  FORDESCRICAO VARCHAR(50),
  FORRUA VARCHAR(100) NOT NULL,
  FORNUMERO INTEGER NOT NULL,
  FORCOMPLEMENTO VARCHAR(50),
  FORBAIRRO VARCHAR(20),
  FORCEP VARCHAR(9),
  FORCIDADE VARCHAR(30), 
  FORESTADO VARCHAR(30),
  FORTELEFONE VARCHAR(15),
  FOREMAIL VARCHAR(50),
  CONSTRAINT PK_TFORNECEDOR PRIMARY KEY (FORCOD)
);

CREATE TABLE TCLIENTE (
  CLICOD SERIAL NOT NULL,
  CLINOME VARCHAR(50) NOT NULL,
  CLILOGIN VARCHAR(50) NOT NULL UNIQUE,
  CLISENHA VARCHAR(50) NOT NULL,
  CLIRUA VARCHAR(100) NOT NULL,
  CLINUMERO INTEGER NOT NULL,
  CLICOMPLEMENTO VARCHAR(50),
  CLIBAIRRO VARCHAR(20),
  CLICEP VARCHAR(9),
  CLICIDADE VARCHAR(30), 
  CLIESTADO VARCHAR(30),
  CLITELEFONE VARCHAR(15), 
  CLIEMAIL VARCHAR(50),
  CLICARTAOCREDITO INTEGER,
  CONSTRAINT PK_TCLIENTE PRIMARY KEY (CLICOD)
);

CREATE TABLE TPRODUTO (
  PROCOD SERIAL NOT NULL,
  PRONOME VARCHAR(50) NOT NULL,
  PRODESCRICAO VARCHAR(300) NOT NULL,
  PROFORNECEDOR INTEGER NOT NULL,
  PROQUANTIDADE INTEGER NOT NULL,
  PROPRECO FLOAT NOT NULL,
  CONSTRAINT PK_TPRODUTO PRIMARY KEY (PROCOD),
  CONSTRAINT FK_TPRODUTO FOREIGN KEY (PROFORNECEDOR) REFERENCES TFORNECEDOR(FORCOD)
);

CREATE TABLE TPEDIDO (
  PEDNUMERO SERIAL NOT NULL,
  PEDCLIENTE INTEGER NOT NULL,
  PEDDATAPEDIDO DATE NOT NULL,
  PEDDATAENTREGA DATE NOT NULL,
  PEDSITUACAO VARCHAR(15) NOT NULL,
  CONSTRAINT PK_TPEDIDO PRIMARY KEY (PEDNUMERO),
  CONSTRAINT FK_TPEDIDO FOREIGN KEY (PEDCLIENTE) REFERENCES TCLIENTE(CLICOD)
);

CREATE TABLE TITEMPEDIDO (
  ITEPRODUTO INTEGER NOT NULL,
  ITEPEDIDO INTEGER NOT NULL,
  ITEQUANTIDADE INTEGER NOT NULL,
  ITEPRECO FLOAT NOT NULL,
  CONSTRAINT PK_TITEMPEDIDO PRIMARY KEY (ITEPRODUTO, ITEPEDIDO),
  CONSTRAINT FK1_TITEMPEDIDO FOREIGN KEY (ITEPRODUTO) REFERENCES TPRODUTO(PROCOD),
  CONSTRAINT FK2_TITEMPEDIDO FOREIGN KEY (ITEPEDIDO) REFERENCES TPEDIDO(PEDNUMERO)
);


