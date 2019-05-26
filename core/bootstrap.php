<?php  

$app = [];

$app['config'] = require 'config.php';


$query = new QueryBuilder(
	Connection::make()
);

?>