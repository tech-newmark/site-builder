<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
include_once($_SERVER["DOCUMENT_ROOT"] . SITE_TEMPLATE_PATH . "/global/template-settings.php");

// use Bitrix\Main\Page\Asset;
// IncludeTemplateLangFile(__FILE__);

if (isset($GLOBALS['SECTION_HEADER_ALIGN'])) {
  $GLOBAL_MODIFIERS = $GLOBALS['SECTION_HEADER_ALIGN'];
}

if (isset($GLOBALS['SECTION_TITLE_UNDERLINE_ENABLED']) && $GLOBALS['SECTION_TITLE_UNDERLINE_ENABLED'] === "Y") {
  $GLOBAL_MODIFIERS .= ' ' . '--section-headers-underlined';
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">

<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <? $APPLICATION->ShowHead(); ?>
  <title><? $APPLICATION->ShowTitle() ?></title>
  <!-- <link href="<?= SITE_TEMPLATE_PATH ?>/assets/styles.css" type="text/css" rel="stylesheet" /> -->
  <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/assets/js/theme.js'); ?>
  <? $APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . '/assets/js/main.js'); ?>

</head>

<body>
  <div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
  <header>
    <img src="<?= $GLOBALS["SITE_LOGO"] ?>" alt="" width="200" height="80">
  </header>
  <main id="workarea" class="<?= $GLOBAL_MODIFIERS ?>">

    <!-- <h1 id="pagetitle"><? $APPLICATION->ShowTitle(false); ?></h1> -->