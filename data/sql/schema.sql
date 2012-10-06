CREATE TABLE article (id BIGINT AUTO_INCREMENT, title VARCHAR(255), content text, author_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME, INDEX author_id_idx (author_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE comment (id BIGINT AUTO_INCREMENT, article_id BIGINT, author_id BIGINT, content text, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, deleted_at DATETIME, INDEX author_id_idx (author_id), INDEX article_id_idx (article_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE config (id BIGINT AUTO_INCREMENT, `key` VARCHAR(255), value text, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE contact (id BIGINT AUTO_INCREMENT, author_id BIGINT, content text, deleted TINYINT DEFAULT 0 NOT NULL, created_at DATETIME NOT NULL, INDEX author_id_idx (author_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE f_a_q (id BIGINT AUTO_INCREMENT, question text, answer text, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE poll (id BIGINT AUTO_INCREMENT, name VARCHAR(255), date_start DATE, date_end DATE, created_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE poll_account (id BIGINT AUTO_INCREMENT, poll_option_id BIGINT, account_id BIGINT, INDEX poll_option_id_idx (poll_option_id), INDEX account_id_idx (account_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE poll_option (id BIGINT AUTO_INCREMENT, poll_id BIGINT, name VARCHAR(255), INDEX poll_id_idx (poll_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE rank (id BIGINT AUTO_INCREMENT, account_id BIGINT, name VARCHAR(255), INDEX account_id_idx (account_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE rule (id BIGINT AUTO_INCREMENT, content text, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE ticket (id BIGINT, category_id BIGINT, state VARCHAR(255), name VARCHAR(255), INDEX category_id_idx (category_id)) ENGINE = INNODB;
CREATE TABLE ticket_answer (id BIGINT, ticket_id BIGINT, author_id BIGINT, content text, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX ticket_id_idx (ticket_id), INDEX author_id_idx (author_id)) ENGINE = INNODB;
CREATE TABLE ticket_category (id BIGINT, name VARCHAR(255), icon VARCHAR(40), description text, root_id BIGINT, lft INT, rgt INT, level SMALLINT) ENGINE = INNODB;