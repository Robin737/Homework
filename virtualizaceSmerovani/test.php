<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once "functions.php";
    require_once "Node.php";
    require_once "Search.php";

    Node::setFromCsv("grafs/network.csv");

    $nodes = Node::getNodes();

    echo "Start: " . $nodes[0]->getName() . " Konec: " . $nodes[1]->getName() . "<br>";
    $table = Search::run($nodes[0], $nodes[1]);
    Search::echoTable($table);

    echo "<br><br>";

    echo "Start: " . $nodes[1]->getName() . " Konec: " . Node::getNodeByName("R4")->getName() . "<br>";
    $table = Search::run($nodes[1], Node::getNodeByName("R4"));
    Search::echoTable($table);

    echo "<br><br>";
    $cesta = Search::getPathByTable($table, $nodes[0]);
    foreach ($cesta as $value) {
        echo $value->getName() . "<br>";
    };
    ?>
</body>

</html>