<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

if ($GLOBALS["CLIENTS_PREVIEW_SECTION_VIEW"] === '1') {
  $MIN_COUNT = 24;
  $ITEMS = &$arResult["ITEMS"];
  if (count($ITEMS) < $MIN_COUNT) {
    while (count($ITEMS) < $MIN_COUNT) {
      $remaining = $MIN_COUNT - count($ITEMS);
      $ITEMS = array_merge($ITEMS, array_slice($ITEMS, 0, $remaining));
    }
  }

  if (isset($GLOBALS['CLIENTS_PREVIEW_FULLWIDTH_SLIDER'])) {
    $arResult["RES_MOD_GRID_MODIFIERS"] .= $GLOBALS['CLIENTS_PREVIEW_FULLWIDTH_SLIDER'] . ' ';
  }
}

if ($GLOBALS["CLIENTS_PREVIEW_SECTION_VIEW"] === '2') {
  if (isset($GLOBALS['CLIENTS_PREVIEW_GRID_ALIGN'])) {
    $arResult["RES_MOD_GRID_MODIFIERS"] .= $GLOBALS['CLIENTS_PREVIEW_GRID_ALIGN'] . ' ';
  }
  if (isset($GLOBALS['CLIENTS_PREVIEW_GRID_ITEM_FILLED_BG'])) {
    $arResult["RES_MOD_GRID_MODIFIERS"] .= $GLOBALS['CLIENTS_PREVIEW_GRID_ITEM_FILLED_BG'] . ' ';
  }
  if (isset($GLOBALS['CLIENTS_PREVIEW_GRID_ITEM_BORDERED'])) {
    $arResult["RES_MOD_GRID_MODIFIERS"] .= $GLOBALS['CLIENTS_PREVIEW_GRID_ITEM_BORDERED'] . ' ';
  }
}

if (isset($GLOBALS['CLIENTS_PREVIEW_ICON_SIZE'])) {
  $arResult["RES_MOD_GRID_MODIFIERS"] .= $GLOBALS['CLIENTS_PREVIEW_ICON_SIZE'] . ' ';
}
