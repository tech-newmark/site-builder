<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php");

use Bitrix\Main\Config\Option;

if (!$USER->IsAdmin()) {
  $APPLICATION->AuthForm("Доступ запрещён");
}

// Переменные для хранения текущих значений
$values = [
  'OPTION_BORDER_RADIUS' => Option::get("main", "OPTION_BORDER_RADIUS", "Без скругления"),

  'FEATURES_SECTION_TYPE' => Option::get("main", "FEATURES_SECTION_TYPE", "1"),
  'FEATURES_SECTION_ENABLED' => Option::get("main", "FEATURES_SECTION_ENABLED", "N"),
];

// Если форма была отправлена
if ($_SERVER["REQUEST_METHOD"] == "POST" && check_bitrix_sessid()) {
  $option_border_radius = $_POST["OPTION_BORDER_RADIUS"] ?? "Без скругления";

  $features_section_type = $_POST["FEATURES_SECTION_TYPE"] ?? "1";
  $features_section_enabled = $_POST["FEATURES_SECTION_ENABLED"] ?? "N";

  Option::set("main", "OPTION_BORDER_RADIUS", $option_border_radius);

  Option::set("main", "FEATURES_SECTION_TYPE", $features_section_type);
  Option::set("main", "FEATURES_SECTION_ENABLED", $features_section_enabled);

  // После сохранения обновляем значения
  $values["OPTION_BORDER_RADIUS"] = $option_border_radius;

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

  <h2>Общие настройки сайта</h2>

  <table class="adm-detail-content-table edit-table">
    <!-- <tr>
      <td>Использовать тени </td>
      <td>
        <input type="checkbox" name="FEATURES_SECTION_ENABLED" value="Y" <?= ($values['FEATURES_SECTION_ENABLED'] === 'Y' ? "checked" : "") ?>>
      </td>
    </tr> -->
    <tr>
      <td>Скругления блоков</td>
      <td>
        <select name="OPTION_BORDER_RADIUS">
          <option value="1" <?= ($values['OPTION_BORDER_RADIUS'] === '1' ? "selected" : "") ?>>Без скругления</option>
          <option value="2" <?= ($values['OPTION_BORDER_RADIUS'] === '2' ? "selected" : "") ?>>5px</option>
          <option value="3" <?= ($values['OPTION_BORDER_RADIUS'] === '3' ? "selected" : "") ?>>10px</option>
          <option value="4" <?= ($values['OPTION_BORDER_RADIUS'] === '4' ? "selected" : "") ?>>15px</option>
          <option value="5" <?= ($values['OPTION_BORDER_RADIUS'] === '5' ? "selected" : "") ?>>30px</option>
        </select>
      </td>
    </tr>
  </table>

  <h2>Блок «Наши преимущества»</h2>

  <table class="adm-detail-content-table edit-table">
    <tr>
      <td>Показывать раздел</td>
      <td>
        <input type="checkbox" name="FEATURES_SECTION_ENABLED" value="Y" <?= ($values['FEATURES_SECTION_ENABLED'] === 'Y' ? "checked" : "") ?>>
      </td>
    </tr>
    <tr>
      <td>Вид отображения блока</td>
      <td>
        <select name="FEATURES_SECTION_TYPE">
          <option value="1" <?= ($values['FEATURES_SECTION_TYPE'] === '1' ? "selected" : "") ?>>1</option>
          <option value="2" <?= ($values['FEATURES_SECTION_TYPE'] === '2' ? "selected" : "") ?>>2</option>
          <option value="3" <?= ($values['FEATURES_SECTION_TYPE'] === '3' ? "selected" : "") ?>>3</option>
          <option value="4" <?= ($values['FEATURES_SECTION_TYPE'] === '4' ? "selected" : "") ?>>4</option>
          <option value="5" <?= ($values['FEATURES_SECTION_TYPE'] === '5' ? "selected" : "") ?>>5</option>
          <option value="6" <?= ($values['FEATURES_SECTION_TYPE'] === '6' ? "selected" : "") ?>>6</option>
          <option value="7" <?= ($values['FEATURES_SECTION_TYPE'] === '7' ? "selected" : "") ?>>7</option>
        </select>
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