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
  'title-underline-color' => Option::get("main", "title-underline-color", "var(--dark-color)"),
  'site-bg-color' => Option::get("main", "site-bg-color", "var(--site-bg-color)"),
];

$jsThemeSettings = Json::encode($themeSettings);

$GLOBALS["SITE_LOGO"] = Option::get("main", "SITE_LOGO", "");
$GLOBALS["SECTION_HEADER_ALIGN"] = Option::get("main", "SECTION_HEADER_ALIGN", "По центру");
$GLOBALS["SECTION_TITLE_UNDERLINE_ENABLED"] = Option::get("main", "SECTION_TITLE_UNDERLINE_ENABLED", "N");

$GLOBALS["FEATURES_SECTION_ENABLED"] = Option::get("main", "FEATURES_SECTION_ENABLED", "N");
$GLOBALS["FEATURES_SECTION_SORT"] = Option::get("main", "FEATURES_SECTION_SORT", "100");
$GLOBALS["FEATURES_SECTION_VIEW"] = Option::get("main", "FEATURES_SECTION_VIEW", "Грид-сетка из пяти элементов");

$GLOBALS["ABOUT_PREVIEW_SECTION_ENABLED"] = Option::get("main", "ABOUT_PREVIEW_SECTION_ENABLED", "N");
$GLOBALS["ABOUT_PREVIEW_SECTION_SORT"] = Option::get("main", "ABOUT_PREVIEW_SECTION_SORT", "100");
$GLOBALS["ABOUT_PREVIEW_SECTION_VIEW"] = Option::get("main", "ABOUT_PREVIEW_SECTION_VIEW", "Изображение слева | Контент справа");
$GLOBALS["ABOUT_PREVIEW_SECTION_LIST_VIEW"] = Option::get("main", "ABOUT_PREVIEW_SECTION_LIST_VIEW", "Сетка в два ряда");
$GLOBALS["ABOUT_PREVIEW_SECTION_CONTENT_POSITION"] = Option::get("main", "ABOUT_PREVIEW_SECTION_CONTENT_POSITION", "По верху блока");
