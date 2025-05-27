<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php");

if (!$USER->IsAdmin()) {
  $APPLICATION->AuthForm("Доступ запрещён");
}
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_after.php");
$APPLICATION->SetTitle("Решение NEWMARK Simple v1.0.0");

use Bitrix\Main\Page\Asset;

Asset::getInstance()->addString(
  '<link rel="stylesheet" href="/local/php_interface/admin/newmark-template-settings/assets/styles/main.css" type="text/css" />',
);
Asset::getInstance()->addString(
  '<script src="/local/php_interface/admin/newmark-template-settings/assets/scripts/main.js"></script>'
);

require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/include/options.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/include/form.php");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_admin.php");
