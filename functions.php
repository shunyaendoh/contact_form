<?php

// エスケープ処理
// $str:エスケープしたい文字
// return: エスケープした文字
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
  
}

?>