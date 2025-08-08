<?

use Bitrix\Main\Web\Json;
use Bitrix\Main\Config\Option;

$themeSettings = [
  'content-width' => Option::get("main", "content-width", "1680px"),
  'site-base-font-family' => Option::get("main", "site-base-font-family", "var(--montserrat)"),
  'primary-color' => Option::get("main", "primary-color", "var(--primary-color)"),
  'secondary-color' => Option::get("main", "secondary-color", "var(--secondary-color)"),
  'current-border-radius' => Option::get("main", "current-border-radius", "0"),
  'section-title-color' => Option::get("main", "section-title-color", "var(--dark-color)"),
  'title-underline-color' => Option::get("main", "title-underline-color", "var(--dark-color)"),
  'site-bg-color' => Option::get("main", "site-bg-color", "var(--site-bg-color)"),
];

$jsThemeSettings = Json::encode($themeSettings);

$GLOBALS["SITE_LOGO"] = Option::get("main", "SITE_LOGO", "");
$GLOBALS["SECTION_HEADER_ALIGN"] = Option::get("main", "SECTION_HEADER_ALIGN", "--section-headers-align-center");
$GLOBALS["SECTION_TITLE_UNDERLINE_ENABLED"] = Option::get("main", "SECTION_TITLE_UNDERLINE_ENABLED", "N");

$GLOBALS["TOP_BANNER_HEIGHT"] = Option::get("main", "TOP_BANNER_HEIGHT", "--fullheight");
$GLOBALS["TOP_BANNER_BUTTONS_BORDER_RADIUS"] = Option::get("main", "TOP_BANNER_BUTTONS_BORDER_RADIUS", "--rounded-relative");
$GLOBALS["TOP_BANNER_CONTENT_FULLWIDTH"] = Option::get("main", "TOP_BANNER_CONTENT_FULLWIDTH", "N");
$GLOBALS["TOP_BANNER_BLURED_CONTENT_ENABLED"] = Option::get("main", "TOP_BANNER_BLURED_CONTENT_ENABLED", "N");
$GLOBALS["TOP_BANNER_CONTENT_POSITION_LEFT_ENABLED"] = Option::get("main", "TOP_BANNER_CONTENT_POSITION_LEFT_ENABLED", "N");
$GLOBALS["TOP_BANNER_BORDERED_CONTENT_ENABLED"] = Option::get("main", "TOP_BANNER_BORDERED_CONTENT_ENABLED", "N");
$GLOBALS["TOP_BANNER_ROUNDED_CONTENT_ENABLED"] = Option::get("main", "TOP_BANNER_ROUNDED_CONTENT_ENABLED", "N");
$GLOBALS["TOP_BANNER_CONTENT_ALIGN"] = Option::get("main", "TOP_BANNER_CONTENT_ALIGN", "--content-align-left");
$GLOBALS["TOP_BANNER_PICTURE_FULLHEIGHT"] = Option::get("main", "TOP_BANNER_PICTURE_FULLHEIGHT", "N");
$GLOBALS["TOP_BANNER_PICTURE_ROUNDED_ENABLED"] = Option::get("main", "TOP_BANNER_PICTURE_ROUNDED_ENABLED", "N");

$GLOBALS['TOP_BANNER_SLIDER_NAVIGATION_ENABLED'] = Option::get("main", "TOP_BANNER_SLIDER_NAVIGATION_ENABLED", "N");
$GLOBALS['TOP_BANNER_SLIDER_BUTTONS_ROUNDED_ENABLED'] = Option::get("main", "TOP_BANNER_SLIDER_BUTTONS_ROUNDED_ENABLED", "N");
$GLOBALS['TOP_BANNER_SLIDER_BUTTONS_BORDER_ENABLED'] = Option::get("main", "TOP_BANNER_SLIDER_BUTTONS_BORDER_ENABLED", "N");
$GLOBALS['TOP_BANNER_SLIDER_BUTTONS_BORDER_COLOR'] = Option::get("main", "TOP_BANNER_SLIDER_BUTTONS_BORDER_COLOR", "--bordered-primary");
$GLOBALS['TOP_BANNER_SLIDER_BUTTONS_SIZE'] = Option::get("main", "TOP_BANNER_SLIDER_BUTTONS_SIZE", "--size-sm");
$GLOBALS['TOP_BANNER_SLIDER_BUTTONS_BACKGROUND_COLOR'] = Option::get("main", "TOP_BANNER_SLIDER_BUTTONS_BACKGROUND_COLOR", "--background-none");
$GLOBALS['TOP_BANNER_SLIDER_BUTTONS_ICON_COLOR'] = Option::get("main", "TOP_BANNER_SLIDER_BUTTONS_ICON_COLOR", "--color-primary");

$GLOBALS["TOP_BANNER_SLIDER_PAGINATION_ENABLED"] = Option::get("main", "TOP_BANNER_SLIDER_PAGINATION_ENABLED", "N");
$GLOBALS["TOP_BANNER_SLIDER_PAGINATION_TYPE"] = Option::get("main", "TOP_BANNER_SLIDER_PAGINATION_TYPE", "--pagination-bullets-circle");
$GLOBALS["TOP_BANNER_SLIDER_PAGINATION_SIZE"] = Option::get("main", "TOP_BANNER_SLIDER_PAGINATION_SIZE", "--pagination-bullets-size-sm");

$GLOBALS["FEATURES_SECTION_ENABLED"] = Option::get("main", "FEATURES_SECTION_ENABLED", "Y");
$GLOBALS["FEATURES_SECTION_SORT"] = Option::get("main", "FEATURES_SECTION_SORT", "100");
$GLOBALS["FEATURES_SECTION_VIEW"] = Option::get("main", "FEATURES_SECTION_VIEW", "1");

$GLOBALS["ABOUT_PREVIEW_SECTION_ENABLED"] = Option::get("main", "ABOUT_PREVIEW_SECTION_ENABLED", "Y");
$GLOBALS["ABOUT_PREVIEW_SECTION_SORT"] = Option::get("main", "ABOUT_PREVIEW_SECTION_SORT", "100");
$GLOBALS["ABOUT_PREVIEW_SECTION_VIEW"] = Option::get("main", "ABOUT_PREVIEW_SECTION_VIEW", "--normal");
$GLOBALS["ABOUT_PREVIEW_SECTION_LIST_VIEW"] = Option::get("main", "ABOUT_PREVIEW_SECTION_LIST_VIEW", "--row");
$GLOBALS["ABOUT_PREVIEW_SECTION_CONTENT_POSITION"] = Option::get("main", "ABOUT_PREVIEW_SECTION_CONTENT_POSITION", "--align-top");

$GLOBALS["CLIENTS_PREVIEW_SECTION_ENABLED"] = Option::get("main", "CLIENTS_PREVIEW_SECTION_ENABLED", "N");
$GLOBALS["CLIENTS_PREVIEW_SECTION_SORT"] = Option::get("main", "CLIENTS_PREVIEW_SECTION_SORT", "100");
$GLOBALS["CLIENTS_PREVIEW_SECTION_VIEW"] = Option::get("main", "CLIENTS_PREVIEW_SECTION_VIEW", "1");
$GLOBALS["CLIENTS_PREVIEW_GRID_ALIGN"] = Option::get("main", "CLIENTS_PREVIEW_GRID_ALIGN", "--align-center");
$GLOBALS["CLIENTS_PREVIEW_GRID_ITEM_FILLED_BG"] = Option::get("main", "CLIENTS_PREVIEW_GRID_ITEM_FILLED_BG", "--filled-bg-none");
$GLOBALS["CLIENTS_PREVIEW_GRID_ITEM_BORDERED"] = Option::get("main", "CLIENTS_PREVIEW_GRID_ITEM_BORDERED", "--bordered-none");
$GLOBALS["CLIENTS_PREVIEW_ICON_SIZE"] = Option::get("main", "CLIENTS_PREVIEW_ICON_SIZE", "--icon-size-xs");
$GLOBALS["CLIENTS_PREVIEW_FULLWIDTH_SLIDER"] = Option::get("main", "CLIENTS_PREVIEW_FULLWIDTH_SLIDER", "--fullwidth");

$GLOBALS["FAQ_SECTION_ENABLED"] = Option::get("main", "FAQ_SECTION_ENABLED", "N");
$GLOBALS["FAQ_SECTION_SORT"] = Option::get("main", "FAQ_SECTION_SORT", "100");
$GLOBALS["FAQ_SECTION_VIEW"] = Option::get("main", "FAQ_SECTION_VIEW", "--vertical-view");
$GLOBALS["FAQ_SECTION_ACCORDEON_MAXWIDTH"] = Option::get("main", "FAQ_SECTION_ACCORDEON_MAXWIDTH", "--fullwidth");
$GLOBALS["FAQ_SECTION_ACCORDEON_VIEW"] = Option::get("main", "FAQ_SECTION_ACCORDEON_VIEW", "--collapsed-default");
$GLOBALS["FAQ_SECTION_ACCORDEON_TOGGLEMODE"] = Option::get("main", "FAQ_SECTION_ACCORDEON_TOGGLEMODE", "N");
$GLOBALS["FAQ_SECTION_ACCORDEON_BORDERED"] = Option::get("main", "FAQ_SECTION_ACCORDEON_BORDERED", "N");
$GLOBALS["FAQ_SECTION_ACCORDEON_ROUNDED"] = Option::get("main", "FAQ_SECTION_ACCORDEON_ROUNDED", "N");
