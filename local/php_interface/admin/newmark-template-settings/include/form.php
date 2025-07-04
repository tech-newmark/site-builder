<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/functions/renderTextInput.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/functions/renderSelect.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/functions/renderCheckbox.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/functions/renderColorpicker.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/functions/renderFileInput.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/functions/renderSettingsBlock.php");

require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/functions/renderSettingsSection.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/functions/renderFeaturesPreviewSection.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/functions/renderAboutPreviewSection.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/functions/renderClientsPreviewSection.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/admin/newmark-template-settings/functions/renderTopBannerSection.php");
?>

<div class="nm-adm">
  <div class="container">
    <form method="post" action="<?= $APPLICATION->GetCurPage() ?>" class="settings-form" enctype="multipart/form-data">
      <?= bitrix_sessid_post() ?>

      <? renderSettingsSection($values); ?>
      <? renderTopBannerSection($values); ?>
      <? renderFeaturesPreviewSection($values); ?>
      <? renderAboutPreviewSection($values); ?>
      <? renderClientsPreviewSection($values); ?>

      <div class="settings-form-footer">
        <input type="submit" value="Сохранить">
      </div>
    </form>
  </div>


  <? if ($_SERVER["REQUEST_METHOD"] == "POST" && check_bitrix_sessid()): ?>
    <div class="adm-info-message">
      <p>Настройки успешно сохранены</p>
    </div>
  <? endif; ?>
</div>