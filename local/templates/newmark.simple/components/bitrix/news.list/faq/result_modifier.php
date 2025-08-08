<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if (isset($GLOBALS['FAQ_SECTION_VIEW'])) {
  $arResult["RES_MOD_ACCORDEON_MODIFIERS"] .= $GLOBALS['FAQ_SECTION_VIEW'] . ' ';
}

$modifiers = [
  'FAQ_SECTION_ACCORDEON_MAXWIDTH',
  'FAQ_SECTION_ACCORDEON_VIEW',
];

$booleanModifiers = [
  'FAQ_SECTION_ACCORDEON_TOGGLEMODE' => '--js--toggle-mode',
  'FAQ_SECTION_ACCORDEON_BORDERED'   => '--bordered-items',
  'FAQ_SECTION_ACCORDEON_ROUNDED'    => '--rounded-items',
];

// Добавляем строковые модификаторы (если установлены)
foreach ($modifiers as $key) {
  if (isset($GLOBALS[$key])) {
    $arResult["RES_MOD_ACCORDEON_MODIFIERS"] .= $GLOBALS[$key] . ' ';
  }
}

// Добавляем булевы модификаторы (если установлены и равны "Y")
foreach ($booleanModifiers as $key => $value) {
  if (isset($GLOBALS[$key]) && $GLOBALS[$key] === 'Y') {
    $arResult["RES_MOD_ACCORDEON_MODIFIERS"] .= $value . ' ';
  }
}
