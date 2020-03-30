
<?php
require "Template.php";

$data = array(
    "title" => "popisek stránky",
    "message" => "zpráva",
    "h1" => "nadpis H1"
);

$test = new Template();
$test->setData($data);
$test->setFileName("samohyl.html");
$test->render();