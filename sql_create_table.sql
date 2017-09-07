use messagerie;
CREATE table uti_utilisateur(
uti_oid INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
uti_prenom VARCHAR(30),
uti_nom VARCHAR(30));
CREATE table num_nn_uti_mes(
uti_oid INT,
mes_oid INT);
CREATE TABLE mes_message(
mes_oid INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
mes_titre VARCHAR(50),
mes_texte VARCHAR(300),
mes_date DATE,
uti_oid INT);