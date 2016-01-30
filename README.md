# stgbot
Simple text generator based on a template

Класс представляет собой простой шаблонизатор, который может загружать шаблон из файла или принимать его в качестве строки.

Пример кода для использования:

<?php

  $tmp = new Stgbot();
  
  $tmp->loadFromFile( $path ); // $path - путь к файлу
  
  /* или */
 
  $tmp->loadAsString( $str_template  ); // $str_template - шаблон в виде строки
  
  $tmp->assing(array("то, что нужно заменить" => "то, на что нужно заменить"));
  
  $tmp->process()->display();
  
?>
