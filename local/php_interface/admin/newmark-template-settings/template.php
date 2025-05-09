<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php");

use Bitrix\Main\Config\Option;

if (!$USER->IsAdmin()) {
  $APPLICATION->AuthForm("Доступ запрещён");
}

// Переменные для хранения текущих значений
$values = [
  'FEATURES_SECTION_TYPE' => Option::get("main", "FEATURES_SECTION_TYPE", "1"),
  'FEATURES_SECTION_ENABLED' => Option::get("main", "FEATURES_SECTION_ENABLED", "N"),
];

// Если форма была отправлена
if ($_SERVER["REQUEST_METHOD"] == "POST" && check_bitrix_sessid()) {
  $features_section_type = $_POST["FEATURES_SECTION_TYPE"] ?? "1";
  $features_section_enabled = $_POST["FEATURES_SECTION_ENABLED"] ?? "Y";

  Option::set("main", "FEATURES_SECTION_TYPE", $features_section_type);
  Option::set("main", "FEATURES_SECTION_ENABLED", $features_section_enabled);

  // После сохранения обновляем значения
  $values["FEATURES_SECTION_TYPE"] = $features_section_type;
  $values["FEATURES_SECTION_ENABLED"] = $features_section_enabled;
}
?>

<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_after.php");
$APPLICATION->SetTitle("Решение NEWMARK Simple v1.0.0");
?>

<form method="post" action="<?= $APPLICATION->GetCurPage() ?>">
  <?= bitrix_sessid_post() ?>

  <h2>Блок Наши преимущества</h2>

  <table class="adm-detail-content-table edit-table">
    <tr>
      <td>Вид отображения блока</td>
      <td>
        <select name="FEATURES_SECTION_TYPE">
          <option value="1" <?php if ($values['FEATURES_SECTION_TYPE'] === '1') echo "selected"; ?>>1</option>
          <option value="2" <?php if ($values['FEATURES_SECTION_TYPE'] === '2') echo "selected"; ?>>2</option>
          <option value="3" <?php if ($values['FEATURES_SECTION_TYPE'] === '3') echo "selected"; ?>>3</option>
          <option value="4" <?php if ($values['FEATURES_SECTION_TYPE'] === '4') echo "selected"; ?>>4</option>
          <option value="5" <?php if ($values['FEATURES_SECTION_TYPE'] === '5') echo "selected"; ?>>5</option>
          <option value="6" <?php if ($values['FEATURES_SECTION_TYPE'] === '6') echo "selected"; ?>>6</option>
          <option value="7" <?php if ($values['FEATURES_SECTION_TYPE'] === '7') echo "selected"; ?>>7</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Показывать раздел</td>
      <td>
        <input type="checkbox" name="FEATURES_SECTION_ENABLED" value="Y" <?php if ($values['FEATURES_SECTION_ENABLED'] === 'Y') echo "checked"; ?>>
      </td>
      </td>
    </tr>
  </table>

  <br>
  <br>
  <input type="submit" value="Сохранить">
</form>

<?
if ($_SERVER["REQUEST_METHOD"] == "POST" && check_bitrix_sessid()) {
  echo '<div class="adm-info-message"><p>Настройки успешно сохранены</p></div>';
}

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_admin.php");
?>