<?php
$file = dirname(__FILE__)."/users.csv";
$tab = [];

if (file_exists($file)) {

    $content = file($file);
    foreach ($content as $line) {
        $info = explode(",", $line);
        $tab[$info[0]] = [
            'email' => $info[0],
            'prénom' => $info[2],
            'nom' => $info[3]
        ];
    }
}
