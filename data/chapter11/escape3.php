<?php
$word = '<h1>こんにちは</h1>';
echo html_escape($word);
function html_escape($word)
{
    return htmlspecialchars($word, ENT_QUOTES, 'UTF-8');
}

