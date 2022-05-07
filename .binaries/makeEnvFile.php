<?php

/**
 * Script PHP permettant de définir la configuration du .env
 */

$COMPOSE_PROJECT_NAME = readline('Nom du projet utilisé pour le docker compose: ') ?: 'my-project';
$WORDPRESS_DB_NAME = readline('Nom de la base de données: ') ?: 'wpdb';
$WORDPRESS_TABLE_PREFIX = readline('Prefix de la base de données (ex: wp_1234): ') ?: 'wp_' . rand(1234, 9876);
$WORDPRESS_DB_USER = readline('Utilisateur de la base de données: ') ?: 'db_user';
$WORDPRESS_DB_PASSWORD = readline('Mot de passe de la base de données pour cet utilisateur: ') ?: 'my_db_pwd';

$envFile = fopen(".env", "w");
fwrite($envFile, "COMPOSE_PROJECT_NAME=$COMPOSE_PROJECT_NAME\n");
fwrite($envFile, "WORDPRESS_DB_NAME=$WORDPRESS_DB_NAME\n");
fwrite($envFile, "WORDPRESS_TABLE_PREFIX=$WORDPRESS_TABLE_PREFIX\n");
fwrite($envFile, "WORDPRESS_DB_USER=$WORDPRESS_DB_USER\n");
fwrite($envFile, "WORDPRESS_DB_PASSWORD=$WORDPRESS_DB_PASSWORD\n");
fwrite($envFile, "WORDPRESS_DB_HOST=db\n");
fwrite($envFile, "WORDPRESS_DB_PORT=3306\n");
fclose($envFile);
