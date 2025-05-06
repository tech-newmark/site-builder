<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php");

use Bitrix\Main\Config\Option;

if (!$USER->IsAdmin()) {
  $APPLICATION->AuthForm("Доступ запрещён");
}

// Переменные для хранения текущих значений
$values = [
  'HEADER_ENABLE' => Option::get("main", "HEADER_ENABLE", "N"),
  'HEADER_BACKGROUND' => Option::get("main", "HEADER_BACKGROUND", "white"),
  'HEADER_PHONE' => Option::get("main", "HEADER_PHONE", ""),
  'FOOTER_ENABLE' => Option::get("main", "FOOTER_ENABLE", "N"),
  'FOOTER_EMAIL' => Option::get("main", "FOOTER_EMAIL", ""),
  'FOOTER_SOCIAL' => Option::get("main", "FOOTER_SOCIAL", ""),
  'PRODUCT_SHOW_PRICE' => Option::get("main", "PRODUCT_SHOW_PRICE", "Y"),
  'PRODUCT_SHOW_BUTTON' => Option::get("main", "PRODUCT_SHOW_BUTTON", "N"),
];

// Если форма была отправлена
if ($_SERVER["REQUEST_METHOD"] == "POST" && check_bitrix_sessid()) {
  // Простые имена полей
  $header_enable = $_POST['HEADER_ENABLE'] ?? 'N';
  $header_background = $_POST['HEADER_BACKGROUND'] ?? 'white';
  $header_phone = $_POST['HEADER_PHONE'] ?? '';

  $footer_enable = $_POST['FOOTER_ENABLE'] ?? 'N';
  $footer_email = $_POST['FOOTER_EMAIL'] ?? '';
  $footer_social = $_POST['FOOTER_SOCIAL'] ?? '';

  $product_show_price = $_POST['PRODUCT_SHOW_PRICE'] ?? 'Y';
  $product_show_button = $_POST['PRODUCT_SHOW_BUTTON'] ?? 'N';

  // Сохраняем
  Option::set("main", "HEADER_ENABLE", $header_enable);
  Option::set("main", "HEADER_BACKGROUND", $header_background);
  Option::set("main", "HEADER_PHONE", $header_phone);

  Option::set("main", "FOOTER_ENABLE", $footer_enable);
  Option::set("main", "FOOTER_EMAIL", $footer_email);
  Option::set("main", "FOOTER_SOCIAL", $footer_social);

  Option::set("main", "PRODUCT_SHOW_PRICE", $product_show_price);
  Option::set("main", "PRODUCT_SHOW_BUTTON", $product_show_button);

  // После сохранения обновляем значения
  $values['HEADER_ENABLE'] = $header_enable;
  $values['HEADER_BACKGROUND'] = $header_background;
  $values['HEADER_PHONE'] = $header_phone;

  $values['FOOTER_ENABLE'] = $footer_enable;
  $values['FOOTER_EMAIL'] = $footer_email;
  $values['FOOTER_SOCIAL'] = $footer_social;

  $values['PRODUCT_SHOW_PRICE'] = $product_show_price;
  $values['PRODUCT_SHOW_BUTTON'] = $product_show_button;
}
?>

<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_after.php");
$APPLICATION->SetTitle("Решение NewMark Simple v1.0.0");
?>

<style>
  .adm-info-message {
    background-color: #f9f9f9;
    border: 1px solid #eaeaea;
    padding: 10px;
    margin-bottom: 10px;
    color: #333;
  }
</style>

<form method="post" action="<?= $APPLICATION->GetCurPage() ?>">
  <?= bitrix_sessid_post() ?>

  <h2>Настройки какого-то блока</h2>
  <table class="adm-detail-content-table edit-table">
    <tr>
      <td width="40%">Чекбокс</td>
      <td><input type="checkbox" name="HEADER_ENABLE" value="Y" <?php if ($values['HEADER_ENABLE'] === 'Y') echo "checked"; ?>></td>
    </tr>
    <tr>
      <td>Радиокнопка</td>
      <td>
        <input type="radio" name="PRODUCT_SHOW_PRICE" value="Y" <?php if ($values['PRODUCT_SHOW_PRICE'] !== 'N') echo "checked"; ?>> Да
        <input type="radio" name="PRODUCT_SHOW_PRICE" value="N" <?php if ($values['PRODUCT_SHOW_PRICE'] === 'N') echo "checked"; ?>> Нет
      </td>
    </tr>
    <tr>
      <td>Выпадающий список</td>
      <td>
        <select name="HEADER_BACKGROUND">
          <option value="white" <?php if ($values['HEADER_BACKGROUND'] === 'white') echo "selected"; ?>>Белый</option>
          <option value="lightblue" <?php if ($values['HEADER_BACKGROUND'] === 'lightblue') echo "selected"; ?>>Светло-голубой</option>
          <option value="dark" <?php if ($values['HEADER_BACKGROUND'] === 'dark') echo "selected"; ?>>Темный</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Текстовое поле</td>
      <td><input type="text" name="HEADER_PHONE" value="<?= htmlspecialcharsbx($values['HEADER_PHONE']) ?>"></td>
    </tr>
  </table>

  <input type="submit" value="Сохранить">
</form>

<?
if ($_SERVER["REQUEST_METHOD"] == "POST" && check_bitrix_sessid()) {
  echo '<div class="adm-info-message"><p>Настройки успешно сохранены</p></div>';
}

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_admin.php");
?>