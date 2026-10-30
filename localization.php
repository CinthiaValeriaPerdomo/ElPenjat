<?php
$localization = json_decode(
    file_get_contents(__DIR__ . '/localization.json'),
    true
);
$page = "";

function getLang() {
    return $_SESSION["lang"];
}
function setLang($lang) {
    $_SESSION["lang"] = $lang;
}
function setPage($pageName) {
    global $page;
    $page = $pageName;
}

// Funció per traduir
function t($key) {
    global $localization, $page;
    
    $lang = getLang();
    
    $str = $localization[$page][$key][$lang]
        ?? $localization["_shared"][$key][$lang]
        ?? $key;
    return $str;
}
?>