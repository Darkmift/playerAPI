<?php

$directory = __DIR__;
echo '<pre>';
$dirlist = scandir($directory);
foreach ($dirlist as $musicDir) {
    if (is_numeric($musicDir[0])) {
        $songDir = scandir($musicDir);
        echo "<hr><h1><i>$musicDir</i></h1><br><br>";

        foreach ($songDir as $song => $value) {
            if (is_numeric($value[0])) {
                echo "<a href='$musicDir/$value'>" . basename($value) . "</a><br><br>";
            }
        }
    }
}
