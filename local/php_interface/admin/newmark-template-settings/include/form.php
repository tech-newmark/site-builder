<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/functions/renderSettingsBlock.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/functions/renderSelect.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/functions/renderCheckbox.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/functions/renderColorpicker.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/functions/renderSettingsSection.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/functions/renderFeaturesPreviewSection.php");
?>

<div class="nm-adm">
  <div class="container">
    <div class="grid">
      <div class="item sidebar">
        <p>sidebar</p>
      </div>
      <div class="item settings">
        <form method="post" action="<?= $APPLICATION->GetCurPage() ?>" class="settings-form">
          <?= bitrix_sessid_post() ?>

          <? renderSettingsSection($values); ?>
          <? renderFeaturesPreviewSection($values); ?>

          <input type="submit" value="Сохранить">
        </form>
      </div>
    </div>
  </div>


  <? if ($_SERVER["REQUEST_METHOD"] == "POST" && check_bitrix_sessid()): ?>
    <div class="adm-info-message">
      <p>Настройки успешно сохранены</p>
    </div>
  <? endif; ?>
</div>