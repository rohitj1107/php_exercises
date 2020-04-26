<?php

$arr = ['0','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];

$a = ['a','z','h','d'];
$c = null;

for($i=0;$i<count($a);$i++){

  if(array_search($a[$i],$arr)){
    $c = $a[$i];
  } else {
    // $c = null;
  }
  echo $c;
}



?>
