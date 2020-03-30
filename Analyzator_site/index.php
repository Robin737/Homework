<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .none {
            display: none;
        }
    </style>
</head>

<body>
    <?php
    include "functions.php";
    ini_set('max_execution_time', 0);

    $networks = array();

    if (isset($_POST["network"])) 
        $network = $_POST["network"];
        $mask = $_POST["mask"];
        $subnet = $_POST["subnet"];
    } else {
        $network = "192.168.1.0";
        $mask = 24;
        $subnet = 1;
    }

    echo "<form method=\"post\">";
    echo "<input name=\"network\" type=\"text\" value=\"" . $network . "\" required>";
    echo "<input name=\"mask\" type=\"number\" min=\"0\" max=\"32\" value=\"" . $mask . "\" required>";
    echo "<br>";
    echo "<input class=\"none\" name=\"subnet\" type=\"number\" min=\"1\" value=\"" . $subnet . "\" required>";
    echo "<br>";
    echo "<input name=\"submit\" type=\"submit\">";
    echo "</form>";

    $i = 1;
    if ($subnet == 1) {
        $subnet = 0;
    }

    //mask calculator
    $mask2 = $mask;
    $decmask = "";
    $i = 0;
    while ($mask2 / 8 > 1. or $mask2 / 8 == 1) {
        $mask2 -= 8;
        if ($i != 0) {
            $decmask .= ".";
        }
        $decmask .= "255";
        $i++;
    }
    if ($mask2 == 0) {
        while ($i != 4) {
            if ($i != 0) {
                $decmask .= ".";
            }
            $decmask .= "0";
            $i++;
        }
    } else {
        $k = 0;
        $imask = "";
        while ($mask2 != 0) {
            $imask .= "1";
            $mask2--;
        }
        while (strlen($imask) != 8) {
            $imask .= "0";
        }
        if ($i != 0) {
            $decmask .= ".";
        }
        $decmask .= bindec($imask);
        $i++;
        while ($i != 4) {
            if ($i != 0) {
                $decmask .= ".";
            }
            $decmask .= "0";
            $i++;
        }
    }

    $ip_no_dots = "";
    $network = explode(".", $network);
    foreach ($network as $value) {
        $ip_no_dots .= str_pad(decbin($value), 8, 0, STR_PAD_LEFT);
    }

    //network
    $i = 0;
    $network = "";
    while ($i != 32) {
        if ($i != 0 and $i % 8 == 0) {
            $network .= ".";
        }
        if ($i >= $mask) {
            $network .= "0";
        } else {
            $network .= $ip_no_dots[$i];
        }
        $i++;
    }

    //broadcast
    $broadcast = "";
    $i = 0;
    while ($i != 32) {
        if ($i != 0 and $i % 8 == 0) {
            $broadcast .= ".";
        }
        if ($i >= $mask) {
            $broadcast .= "1";
        } else {
            $broadcast .= $ip_no_dots[$i];
        }
        $i++;
    }

    //first
    $e_broadcast = explode(".", $broadcast);
    $e_network = explode(".", $network);
    $first = $e_network;
    $first[3] = str_pad($first[3] + decbin(1), 8, 0, STR_PAD_LEFT);
    $f = "";
    foreach ($first as $key => $value) {
        if ($key != 0) {
            $f .= ".";
        }
        $f .= $value;
    }
    $first = $f;


    //last
    $e_broadcast = explode(".", $broadcast);
    $last = $e_broadcast;
    $last[3] = str_pad($last[3] - decbin(1), 8, 0, STR_PAD_LEFT);
    $l = "";
    foreach ($last as $key => $value) {
        if ($key != 0) {
            $l .= ".";
        }
        $l .= $value;
    }
    $last = $l;

    $networks[] = array(
        "N" => $network,
        "F" => $first,
        "L" => $last,
        "B" => $broadcast,
        "M" => $decmask,
        "PC" => (2 ** (32 - $mask)) - 2
    );

    table($networks);
    ?>

</body>

</html>