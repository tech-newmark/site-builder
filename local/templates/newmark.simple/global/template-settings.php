<?

use Bitrix\Main\Web\Json;

$themeSettings = [
  'OPTION_BORDER_RADIUS' => \Bitrix\Main\Config\Option::get("main", "OPTION_BORDER_RADIUS", "Без скругления"),
  'mainColor' => '#5e2b27',
];

$jsThemeSettings = Json::encode($themeSettings);

$GLOBALS["FEATURES_SECTION_TYPE"] = \Bitrix\Main\Config\Option::get("main", "FEATURES_SECTION_TYPE", "1");
$GLOBALS["FEATURES_SECTION_ENABLED"] = \Bitrix\Main\Config\Option::get("main", "FEATURES_SECTION_ENABLED", "Y");
