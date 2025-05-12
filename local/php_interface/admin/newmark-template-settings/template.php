<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php");

if (!$USER->IsAdmin()) {
  $APPLICATION->AuthForm("Доступ запрещён");
}

require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/include/options.php");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_after.php");
$APPLICATION->SetTitle("Решение NEWMARK Simple v1.0.0");

require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/include/form.php");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_admin.php");
