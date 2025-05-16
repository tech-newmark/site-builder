<?

use Bitrix\Main\Web\Json;
use Bitrix\Main\Config\Option;

$themeSettings = [

  'content-width' => Option::get("main", "content-width", "1680px"),
  'site-base-font-family' => Option::get("main", "site-base-font-family", "var(--montserrat)"),
  'primary-color' => Option::get("main", "primary-color", "var(--primary-color)"),
  'secondary-color' => Option::get("main", "secondary-color", "var(--secondary-color)"),
  'base-border-radius' => Option::get("main", "base-border-radius", "Без скругления"),

  'section-title-color' => Option::get("main", "section-title-color", "var(--dark-color)"),
];

$jsThemeSettings = Json::encode($themeSettings);

$GLOBALS["SECTION_TITLE_UNDERLINE_ENABLED"] = Option::get("main", "SECTION_TITLE_UNDERLINE_ENABLED", "N");

$GLOBALS["FEATURES_SECTION_TYPE"] = Option::get("main", "FEATURES_SECTION_TYPE", "1");
$GLOBALS["FEATURES_SECTION_ENABLED"] = Option::get("main", "FEATURES_SECTION_ENABLED", "Y");
$GLOBALS["FEATURES_SECTION_SORT"] = Option::get("main", "FEATURES_SECTION_SORT", "100");
