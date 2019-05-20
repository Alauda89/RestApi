<?php
require __DIR__ . '/../vendor/autoload.php';

include 'config.php';

$app = new Slim\App($config);

$container = $app->getContainer();

function getDB($container) {
    $dbConfig = $container->get('settings')['db'];
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    );
    $pdo = new PDO("mysql:host={$dbConfig['servername']};dbname={$dbConfig['dbname']}",
        $dbConfig['username'], $dbConfig['password'], $options);
    return $pdo;
}

$app->get('/retrieve/{id}', function ($request, $response, $args) use ($container) {
    $db = getDB($container);
    $sth = $db->prepare("SELECT * FROM numbers WHERE id=:id");
    $sth->bindParam("id", $args['id']);
    $sth->execute();
    $retrieve = $sth->fetchObject();
    return $response->write(json_encode([
        'results' => $retrieve,
        'success' => true,
        'total' => count($retrieve),
    ]));
});


$app->post('/generate', function ($request, $response, $args) use ($container) {
    $generate = rand();
    $db = getDB($container);
    $sql = "INSERT INTO numbers (numbers) VALUES (:random)";
    $sth = $db->prepare($sql);
    $sth->bindParam("random", $generate);
    $sth->execute();
    $generate = $db->lastInsertId();
    return $response->write(json_encode([
        'results' => $generate,
        'success' => true,
        'total' => 1,
    ]));
});

$app->run();

