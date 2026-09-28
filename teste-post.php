<?php
  echo "Metodo Recebido: ";
  echo $_SERVER["REQUEST_METHOD"];
  
  echo "\n\ndados recebidos pelo POST:\n";
  print_r($_POST);