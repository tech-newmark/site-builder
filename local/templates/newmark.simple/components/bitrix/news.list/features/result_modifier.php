<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

// Функция для фильтрации ненужных значений
function filterModifiers($value, $excludeValue = '--')
{
  return $value !== $excludeValue;
}

foreach ($arResult["ITEMS"] as $key => $arItem) {
  $modifiers = [];
  // Собираем значения свойств в массив
  $properties = [
    $arItem["PROPERTIES"]["CONTENT_POSITION"]["VALUE_XML_ID"],
    $arItem["PROPERTIES"]["CONTENT_ALIGN"]["VALUE_XML_ID"],
    $arItem["PROPERTIES"]["CONTENT_TEXT_COLOR"]["VALUE_XML_ID"],
    $arItem["PROPERTIES"]["FILLED_BG"]["VALUE_XML_ID"],
    $arItem["PROPERTIES"]["BORDER"]["VALUE_XML_ID"],
    $arItem["PROPERTIES"]["BORDER_WIDTH"]["VALUE_XML_ID"]
  ];
  // Исключаем значения по умолчанию
  $excludeValues = [
    '--content-position-top',
    '--content-align-top',
    '--content-color-dark',
    '--filled-bg-disabled',
  ];

  // Применяем фильтр
  foreach ($properties as $index => $value) {
    if (filterModifiers($value, $excludeValues[$index])) {
      $modifiers[] = $value;
    }
  }
  // Соединяем модификаторы через пробел и записываем в элемент
  $arResult["ITEMS"][$key]["RES_MOD_MODIFIERS"] = implode(' ', $modifiers);
}
