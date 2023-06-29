CREATE TABLE IF NOT EXISTS "endereco" (
	id_endereco INTEGER PRIMARY KEY AUTOINCREMENT,
	cep_endereco INTEGER,
	uf_endereco VARCHAR(2),
	cidade_endereco VARCHAR(64),
	bairro_endereco VARCHAR(128),
	rua_endereco VARCHAR(128),
	numero_endereco INTEGER
);
CREATE TABLE IF NOT EXISTS "produto" (
	id_produto INTEGER PRIMARY KEY AUTOINCREMENT,
	nome_produto VARCHAR(32),
	fornecedor_produto VARCHAR(64),
	preco_encomenda FLOAT
);
CREATE TABLE IF NOT EXISTS "estoque" (
	id_estoque INTEGER PRIMARY KEY AUTOINCREMENT,
	id_endereco INTEGER REFERENCES endereco(idEndereco),
	nome_estoque VARCHAR(128)
);
CREATE TABLE IF NOT EXISTS "produto_estoque" (
	id_produto_estoque INTEGER PRIMARY KEY AUTOINCREMENT,
	codigo_produto VARCHAR(128) UNIQUE,
	id_estoque INTEGER REFERENCES estoque(idEstoque),
	id_produto INTEGER REFERENCES produto(idProduto),
	estoque_produto INTEGER DEFAULT (0),
	vendas_produto INTEGER DEFAULT (0),
	preco_produto FLOAT
);
CREATE TABLE IF NOT EXISTS "usuario" (
	id_usuario INTEGER PRIMARY KEY AUTOINCREMENT,
	apelido_usuario VARCHAR(16) UNIQUE NOT NULL,
	email_usuario VARCHAR(48) UNIQUE NOT NULL,
	senha_usuario VARCHAR(255) NOT NULL
);
CREATE TABLE IF NOT EXISTS "permissao" (
	id_permissao INTEGER PRIMARY KEY AUTOINCREMENT,
	nome_permissao VARCHAR(32)
);
CREATE TABLE IF NOT EXISTS "permissao_usuario" (
	id_permissao_usuario INTEGER PRIMARY KEY AUTOINCREMENT,
	id_usuario INTEGER NOT NULL REFERENCES usuario(idUsuario),
	id_permissao INTEGER NOT NULL REFERENCES permissao(idPermissao)
);
CREATE TABLE IF NOT EXISTS "sessao" (
	id_sessao VARCHAR(22) PRIMARY KEY,
	id_usuario INTEGER REFERENCES usuario(idUsuario)
);