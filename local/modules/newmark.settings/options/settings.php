<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php");

use Bitrix\Main\Config\Option;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

$isAdmin = $USER->IsAdmin();
if (!$isAdmin) $APPLICATION->AuthForm("Доступ запрещен");

if ($_SERVER["REQUEST_METHOD"] == "POST" && check_bitrix_sessid()) {
  Option::set("newmark.settings", "SITE_PHONE", $_POST["SITE_PHONE"]);
  Option::set("newmark.settings", "SITE_EMAIL", $_POST["SITE_EMAIL"]);
}

$APPLICATION->SetTitle("Глобальные настройки шаблона");

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_after.php");
?>

<form method="post" action="<?= $APPLICATION->GetCurPage() ?>">
  <?= bitrix_sessid_post() ?>

  <table class="adm-detail-content-table edit-table">
    <tr>
      <td width="40%">Телефон</td>
      <td><input type="text" name="SITE_PHONE" value="<?= htmlspecialcharsbx(Option::get("newmark.settings", "SITE_PHONE", "")) ?>"></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="SITE_EMAIL" value="<?= htmlspecialcharsbx(Option::get("newmark.settings", "SITE_EMAIL", "")) ?>"></td>
    </tr>
  </table>

  <input type="submit" value="Сохранить">
</form>

<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_admin.php");
