<?php

function table($networks)
{
    echo "<table border=\"1|0\">\n";

    foreach ($networks as $values) {
        echo "<tr>\n";

        echo "<th>\n";
        echo "</th>\n";

        echo "<th>\n";
        echo "ip dec";
        echo "</th>\n";

        echo "<th>\n";
        echo "ip bin";
        echo "</th>\n";

        echo "</tr>\n";

        
        echo "<tr>\n";

        echo "<th>\n";
        echo "Network";
        echo "</th>\n";

        echo "<th>\n";
        $values["N"] = explode(".", $values["N"]);
        foreach ($values["N"] as $key => $value) {
            if ($key != 0) {
                echo ".";
            }
            echo bindec($value);
        }
        echo "</th>\n";
        echo "<th>\n";
        foreach ($values["N"] as $key => $value) {
            if ($key != 0) {
                echo ".";
            }
            echo $value;
        }
        echo "</th>\n";

        echo "</tr>\n";

        echo "<tr>\n";

        echo "<tr>\n";

        echo "<th>\n";
        echo "Mask";
        echo "</th>\n";

        echo "<th>\n";
        echo $values["M"];
        echo "</th>\n";
        echo "<th>\n";
        $values["M"] = explode(".", $values["M"]);
        foreach ($values["M"] as $key => $value) {
            if ($key != 0) {
                echo ".";
            }
            echo str_pad(decbin($value), 8, 0, STR_PAD_LEFT);
        }
        echo "</th>\n";

        echo "</tr>\n";

        echo "<th>\n";
        echo "First";
        echo "</th>\n";

        echo "<th>\n";
        $values["F"] = explode(".", $values["F"]);
        foreach ($values["F"] as $key => $value) {
            if ($key != 0) {
                echo ".";
            }
            echo bindec($value);
        }
        echo "</th>\n";
        echo "<th>\n";
        foreach ($values["F"] as $key => $value) {
            if ($key != 0) {
                echo ".";
            }
            echo $value;
        }
        echo "</th>\n";

        echo "</tr>\n";

        echo "<tr>\n";

        echo "<th>\n";
        echo "Last";
        echo "</th>\n";

        echo "<th>\n";
        $values["L"] = explode(".", $values["L"]);
        foreach ($values["L"] as $key => $value) {
            if ($key != 0) {
                echo ".";
            }
            echo bindec($value);
        }
        echo "</th>\n";
        echo "<th>\n";
        foreach ($values["L"] as $key => $value) {
            if ($key != 0) {
                echo ".";
            }
            echo $value;
        }
        echo "</th>\n";

        echo "</tr>\n";

        echo "<tr>\n";

        echo "<th>\n";
        echo "Broadcast";
        echo "</th>\n";

        echo "<th>\n";
        $values["B"] = explode(".", $values["B"]);
        foreach ($values["B"] as $key => $value) {
            if ($key != 0) {
                echo ".";
            }
            echo bindec($value);
        }
        echo "</th>\n";
        echo "<th>\n";
        foreach ($values["B"] as $key => $value) {
            if ($key != 0) {
                echo ".";
            }
            echo $value;
        }
        echo "</th>\n";

        echo "</tr>\n";

        echo "<tr>\n";

        echo "<th>\n";
        echo "Computers";
        echo "</th>\n";

        echo "<th>\n";
        echo $values["PC"];
        echo "</th>\n";
        echo "<th>\n";
        echo str_pad(decbin($values["PC"]), 8, 0, STR_PAD_LEFT);
        echo "</th>\n";

        echo "</tr>\n";
    }

    echo "</table>\n";
}