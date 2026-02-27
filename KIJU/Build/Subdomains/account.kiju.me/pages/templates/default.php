<?php
ob_start();

require_once 'base.php';

$output = ob_get_contents();
ob_end_clean();

$output = preg_replace('/\s{2,}/', ' ', $output);
echo $output;
