<?php

$searchRoot = 'D:\web\folder1';
$searchResult = Array();
$searchFile = 'text.txt';

find_file($searchRoot, $searchFile, $searchResult);

function find_file(string $path, string $fileName, array &$resultArr) :void {
    foreach (scandir($path) as $dir_el){
        if($dir_el == '..' || $dir_el == '.'){
            continue;
        }
        else if(is_dir($path . '\\' . $dir_el)){
            find_file($path . '\\' . $dir_el, $fileName, $resultArr);
        } else {
            $dir_el === $fileName ? $resultArr[] = $path . '\\' . $fileName : false;
        }
    }
}

if(empty($searchResult)){
    echo 'Поиск не дал результатов';
} else {
    print_r(array_reverse($searchResult));
}


