<?php

define('ROOT', get_template_directory());

define('URI', get_template_directory_uri());

require ROOT . '/vendor/autoload.php';

require ROOT . '/php/bootstrap.php';

function dd($value = null)
{
  array_map(function ($x) {
    var_dump($x);
  }, func_get_args());
  die;
}
