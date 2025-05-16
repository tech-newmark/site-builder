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
  'site-bg-color' => Option::get("main", "site-bg-color", "var(--site-bg-color)"),
];

$jsThemeSettings = Json::encode($themeSettings);

$GLOBALS["SECTION_HEADER_ALIGN"] = Option::get("main", "SECTION_HEADER_ALIGN", "По центру");
$GLOBALS["SECTION_TITLE_UNDERLINE_ENABLED"] = Option::get("main", "SECTION_TITLE_UNDERLINE_ENABLED", "N");

$GLOBALS["FEATURES_SECTION_TYPE"] = Option::get("main", "FEATURES_SECTION_TYPE", "Грид-сетка из пяти элементов");
$GLOBALS["FEATURES_SECTION_ENABLED"] = Option::get("main", "FEATURES_SECTION_ENABLED", "Y");
$GLOBALS["FEATURES_SECTION_SORT"] = Option::get("main", "FEATURES_SECTION_SORT", "100");
