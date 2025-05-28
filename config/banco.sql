-- Criação do banco de dados
CREATE DATABASE IF NOT EXISTS sistema_mensagens;
USE sistema_mensagens;

-- Tabela de usuários (armazena administradores e usuários comuns)
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,  -- Senha será armazenada em hash
    tipo ENUM('admin', 'comum') NOT NULL DEFAULT 'comum',
    status ENUM('ativo', 'inativo') NOT NULL DEFAULT 'ativo',
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabela de mensagens (relaciona remetente e destinatário)
CREATE TABLE mensagens (
    id INT AUTO_INCREMENT PRIMARY KEY,
    remetente_id INT NOT NULL,
    destinatario_id INT NOT NULL,
    assunto VARCHAR(100) NOT NULL,
    conteudo TEXT NOT NULL,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    lida BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (remetente_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (destinatario_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Tabela de contatos (controla quem pode enviar mensagens para quem)
CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,  -- Quem ENVIA a solicitação
    contato_id INT NOT NULL,  -- Quem RECEBE a solicitação
    status ENUM('pendente', 'aceito', 'recusado') NOT NULL DEFAULT 'pendente',
    data_solicitacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (contato_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    UNIQUE KEY (usuario_id, contato_id)  -- Evita solicitações duplicadas
);