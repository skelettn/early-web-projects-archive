<?php

// FireCaptcha

$first_num = rand(1, 10);
$second_num = rand(1, 10);

$operators = array("+", "-", "*");
$operator = rand(0, count($operators) - 1);
$operator = $operators[$operator];

$answer = 0;
switch($operator) {
  case "+":
    $answer = $first_num + $second_num;
    break;
  case "-":
    $answer = $first_num - $second_num;
    break;
  case "*":
    $answer = $first_num * $second_num;
    break;
}

$_SESSION["answer"] = $answer;

// End of php on FireCaptcha/Process.php
// COPYRIGHT Hypera.

?>