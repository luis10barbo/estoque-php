CREATE TABLE IF NOT EXISTS "endereco" (
	idEndereco INTEGER PRIMARY KEY AUTOINCREMENT,
	
	cepEndereco INTEGER,
	ufEndereco VARCHAR(2),
	cidadeEndereco VARCHAR(64),
	bairroEndereco VARCHAR(128),
	ruaEndereco VARCHAR(128),
	numeroEndereco INTEGER
);

CREATE TABLE IF NOT EXISTS "produto" (
	idProduto INTEGER PRIMARY KEY AUTOINCREMENT,
	
	nomeProduto VARCHAR(32),
	fornecedorProduto VARCHAR(64),
	precoEncomenda	FLOAT
);

CREATE TABLE IF NOT EXISTS "estoque" (
	idEstoque INTEGER PRIMARY KEY AUTOINCREMENT,
	idEndereco INTEGER REFERENCES endereco(idEndereco),
	
	nomeEstoque VARCHAR(128)
);

CREATE TABLE IF NOT EXISTS "produtoEstoque" (
	idProdutoEstoque INTEGER PRIMARY KEY AUTOINCREMENT,
	codigoProduto VARCHAR(128) UNIQUE,
	idEstoque INTEGER REFERENCES estoque(idEstoque),
	idProduto INTEGER REFERENCES produto(idProduto),
	
	estoqueProduto INTEGER DEFAULT (0),
	vendasProduto	INTEGER DEFAULT (0),
	precoProduto	FLOAT
);

CREATE TABLE IF NOT EXISTS "usuario" (
	idUsuario INTEGER PRIMARY KEY AUTOINCREMENT,
	apelidoUsuario VARCHAR(16) UNIQUE,
	emailUsuario VARCHAR(32) UNIQUE
);

CREATE TABLE IF NOT EXISTS "permissao" (
	idPermissao INTEGER PRIMARY KEY AUTOINCREMENT,
	nomePermissao VARCHAR(32)
);

CREATE TABLE IF NOT EXISTS  "permissaoUsuario" (
	idPermissaoUsuario INTEGER PRIMARY KEY AUTOINCREMENT,
	idUsuario INTEGER NOT NULL REFERENCES usuario(idUsuario),
	idPermissao INTEGER  NOT NULL REFERENCES permissao(idPermissao)
);

CREATE TABLE IF NOT EXISTS "sessao" (
	hashSessao VARCHAR(22) PRIMARY KEY,
	idUsuario INTEGER REFERENCES usuario(idUsuario)
);

