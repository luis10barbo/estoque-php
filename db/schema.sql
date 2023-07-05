CREATE TABLE IF NOT EXISTS "endereco" (
	id_endereco INTEGER PRIMARY KEY AUTOINCREMENT,
	cep_endereco INTEGER,
	uf_endereco VARCHAR(2),
	cidade_endereco VARCHAR(64),
	bairro_endereco VARCHAR(128),
	rua_endereco VARCHAR(128),
	numero_endereco INTEGER,
	complemento_endereco VARCHAR(32)
);
CREATE TABLE IF NOT EXISTS "produto" (
	id_produto INTEGER PRIMARY KEY AUTOINCREMENT,
	nome_produto VARCHAR(32),
	fornecedor_produto VARCHAR(64),
	preco_encomenda FLOAT
);
CREATE TABLE IF NOT EXISTS "usuario" (
	id_usuario INTEGER PRIMARY KEY AUTOINCREMENT,
	email_usuario VARCHAR(48) UNIQUE NOT NULL,
	senha_usuario VARCHAR(255) NOT NULL
);
CREATE TABLE IF NOT EXISTS "estoque" (
	id_estoque INTEGER PRIMARY KEY AUTOINCREMENT,
	id_endereco INTEGER,
	id_dono INTEGER,
	nome_estoque VARCHAR(128),
	FOREIGN KEY (id_endereco) REFERENCES endereco(id_endereco),
	FOREIGN KEY (id_dono) REFERENCES usuario(id_usuario)
);
CREATE TABLE IF NOT EXISTS "produto_estoque" (
	id_produto_estoque INTEGER PRIMARY KEY AUTOINCREMENT,
	codigo_produto VARCHAR(128),
	id_estoque INTEGER NOT NULL,
	id_produto INTEGER NOT NULL,
	estoque_produto INTEGER DEFAULT (0) NOT NULL,
	vendas_produto INTEGER DEFAULT (0) NOT NULL,
	preco_produto FLOAT DEFAULT (0.0) NOT NULL,
	FOREIGN KEY (id_produto) REFERENCES produto(id_produto),
	FOREIGN KEY (id_estoque) REFERENCES estoque(id_estoque)
);
CREATE TABLE IF NOT EXISTS "permissao" (
	id_permissao INTEGER PRIMARY KEY AUTOINCREMENT,
	nome_permissao VARCHAR(32)
);
CREATE TABLE IF NOT EXISTS "permissao_usuario" (
	id_permissao_usuario INTEGER PRIMARY KEY AUTOINCREMENT,
	id_usuario INTEGER NOT NULL,
	id_permissao INTEGER NOT NULL,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario),
	FOREIGN KEY (id_permissao) REFERENCES permissao(id_permissao)
);
CREATE TABLE IF NOT EXISTS "sessao" (
	id_sessao VARCHAR(22) PRIMARY KEY,
	id_usuario INTEGER,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);