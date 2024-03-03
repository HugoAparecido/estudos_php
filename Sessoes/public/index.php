<?php
session_set_cookie_params(['httponly' => true]);
// lifetime = 0 significa que o cookie será excluído após o navegador ser fechado, para outros valores corresponderá ao tempo em segundo de expiração do cookie
session_start();
//sessions servem para pegar a variável em qualquer parte do sistema, isto é feito por meio de cookies
// Segurança: criar a sessao com http Only e com o protolo ssl
var_dump(session_id());
//Para toda vez que logar o usuário utilizar a função abaixo
//Gera outro cookie com um novo id
//com  true deleta a sessao antiga
session_regenerate_id(true);
$_SESSION['user'] = 'Alexandre';
$_SESSION['person'] = [
    'name' => 'Alexandre',
    'age' => 40,
];
$_SESSION['logged_in'] = true;