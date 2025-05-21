<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

// Расположение контента шапки секции
$alignMap = [
  '2' => '--align-left',
  '3' => '--align-right',
];

if (isset($alignMap[$GLOBALS['SECTION_HEADER_ALIGN']])) {
  $arResult["RES_MOD_MODIFIERS"] = $alignMap[$GLOBALS['SECTION_HEADER_ALIGN']];
}

// // Ограничение количества элементов для разных типов сеток
// $limitMap = [
//   '1' => 5,
//   '2' => 4,
//   '3' => 3,
// ];

// if (isset($limitMap[$GLOBALS['FEATURES_SECTION_TYPE']])) {
//   array_splice($arResult["ITEMS"], $limitMap[$GLOBALS['FEATURES_SECTION_TYPE']]);
// }

// // Добавление модификаторов для карточки преимуществ
// function filterModifiers($value, $excludeValue = '--')
// {
//   return $value !== $excludeValue;
// }

// foreach ($arResult["ITEMS"] as $key => $arItem) {
//   $modifiers = [];

//   $properties = [
//     $arItem["PROPERTIES"]["CONTENT_POSITION"]["VALUE_XML_ID"],
//     $arItem["PROPERTIES"]["CONTENT_ALIGN"]["VALUE_XML_ID"],
//     $arItem["PROPERTIES"]["CONTENT_TEXT_COLOR"]["VALUE_XML_ID"],
//     $arItem["PROPERTIES"]["FILLED_BG"]["VALUE_XML_ID"],
//     $arItem["PROPERTIES"]["BORDER"]["VALUE_XML_ID"],
//     $arItem["PROPERTIES"]["BORDER_WIDTH"]["VALUE_XML_ID"],
//     $arItem["PROPERTIES"]["OVERLAY"]["VALUE_XML_ID"]
//   ];

//   $excludeValues = [
//     '--content-position-top',
//     '--content-align-top',
//     '--content-color-dark',
//     '--filled-bg-disabled',
//   ];

//   foreach ($properties as $index => $value) {
//     if (filterModifiers($value, $excludeValues[$index])) {
//       $modifiers[] = $value;
//     }
//   }

//   $arResult["ITEMS"][$key]["RES_MOD_MODIFIERS"] = implode(' ', $modifiers);
// }
