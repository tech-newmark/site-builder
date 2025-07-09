<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

// common
if (isset($GLOBALS['TOP_BANNER_HEIGHT'])) {
  $arResult["RES_MOD_MODIFIERS"] .= $GLOBALS['TOP_BANNER_HEIGHT'] . ' ';
}

if (isset($GLOBALS['TOP_BANNER_BUTTONS_BORDER_RADIUS'])) {
  $arResult["RES_MOD_BUTTONS_MODIFIERS"] .= $GLOBALS['TOP_BANNER_BUTTONS_BORDER_RADIUS'] . ' ';
}

// Конфигурация модификаторов для карточек
$modifiers = [
  [
    'prop' => 'TOP_BANNER_CONTENT_FULLWIDTH',
    'global' => 'TOP_BANNER_CONTENT_FULLWIDTH',
    'modifier' => '--fullwidth-content'
  ],
  [
    'prop' => 'TOP_BANNER_CONTENT_POSITION_LEFT_ENABLED',
    'global' => 'TOP_BANNER_CONTENT_POSITION_LEFT_ENABLED',
    'modifier' => '--content-position-left'
  ],
  [
    'prop' => 'TOP_BANNER_BLURED_CONTENT_ENABLED',
    'global' => 'TOP_BANNER_BLURED_CONTENT_ENABLED',
    'modifier' => '--blured-content'
  ],
  [
    'prop' => 'TOP_BANNER_BORDERED_CONTENT_ENABLED',
    'global' => 'TOP_BANNER_BORDERED_CONTENT_ENABLED',
    'modifier' => '--bordered-content'
  ],
  [
    'prop' => 'TOP_BANNER_ROUNDED_CONTENT_ENABLED',
    'global' => 'TOP_BANNER_ROUNDED_CONTENT_ENABLED',
    'modifier' => '--rounded-content'
  ],
  [
    'prop' => 'TOP_BANNER_PICTURE_FULLHEIGHT',
    'global' => 'TOP_BANNER_PICTURE_FULLHEIGHT',
    'modifier' => '--fullheight-picture',
    'target' => 'RES_MOD_CONTENT_PICTURE_MODIFIERS'
  ],
  [
    'prop' => 'TOP_BANNER_PICTURE_ROUNDED_ENABLED',
    'global' => 'TOP_BANNER_PICTURE_ROUNDED_ENABLED',
    'modifier' => '--rounded-picture',
    'target' => 'RES_MOD_CONTENT_PICTURE_MODIFIERS'
  ]
];

foreach ($arResult["ITEMS"] as &$arItem) {
  // Обработка модификаторов из списка
  foreach ($modifiers as $config) {
    $propValue = $arItem["PROPERTIES"][$config['prop']]['VALUE'];
    $globalKey = $config['global'];
    $modifier = $config['modifier'];
    $target = $config['target'] ?? 'RES_MOD_CONTENT_MODIFIERS';

    if (
      $propValue === "Y" ||
      (isset($GLOBALS[$globalKey]) && $GLOBALS[$globalKey] === "Y")
    ) {
      $arItem[$target] .= $modifier . ' ';
    }
  }

  // Обработка модификатора ALIGN
  $alignProp = $arItem["PROPERTIES"]["TOP_BANNER_CONTENT_ALIGN"]["VALUE_XML_ID"];
  $alignGlobal = $GLOBALS['TOP_BANNER_CONTENT_ALIGN'] ?? null;

  if (
    isset($alignGlobal) &&
    !empty($alignProp) &&
    $alignProp !== $alignGlobal
  ) {
    $arItem["RES_MOD_CONTENT_MODIFIERS"] .= $alignProp . ' ';
  } else if (isset($alignGlobal)) {
    $arItem["RES_MOD_CONTENT_MODIFIERS"] .= $alignGlobal . ' ';
  }
}
