<?php

$ul = "localhost/a/b/c/d/e/f/cursos/7";
$arrayURL = explode("/", $ul);
$id = end($arrayURL);

var_dump($id);
