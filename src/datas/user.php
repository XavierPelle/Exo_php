<?php
$file = dirname(__FILE__)."/users.csv";
echo basename(dirname($_SERVER['SCRIPT_NAME']), "/");
$tab = [];


if (file_exists($file)) {

    $content = file($file) or die("ERROR: Cannot open the file.");
    foreach ($content as $line) {
        $info = explode(",", $line);
        $tab[$info[0]] = [
            'email' => $info[0],
            'prénom' => $info[2],
            'nom' => $info[3]
        ];
    }
} else {
    echo "ERROR: File does not exist.";
}
