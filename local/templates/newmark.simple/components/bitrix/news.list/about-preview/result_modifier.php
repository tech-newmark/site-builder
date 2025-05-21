<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

// Расположение контента шапки секции
$alignMap = [
  '2' => '--align-left',
  '3' => '--align-right',
];

if (isset($alignMap[$GLOBALS['SECTION_HEADER_ALIGN']])) {
  $arResult["RES_MOD_MODIFIERS"] = $alignMap[$GLOBALS['SECTION_HEADER_ALIGN']];
}

if (isset($GLOBALS['ABOUT_PREVIEW_SECTION_CONTENT_POSITION'])) {
  $arResult["RES_MOD_GRID_MODIFIERS"] .= $GLOBALS['ABOUT_PREVIEW_SECTION_CONTENT_POSITION'] . ' ';
}

if (isset($GLOBALS['ABOUT_PREVIEW_SECTION_VIEW'])) {
  $arResult["RES_MOD_GRID_MODIFIERS"] .= $GLOBALS['ABOUT_PREVIEW_SECTION_VIEW'] . ' ';
}

if (isset($GLOBALS['ABOUT_PREVIEW_SECTION_LIST_VIEW'])) {
  $arResult["RES_MOD_LIST_MODIFIERS"] .= $GLOBALS['ABOUT_PREVIEW_SECTION_LIST_VIEW'] . ' ';
}
