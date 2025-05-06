<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_before.php");

use Bitrix\Main\Config\Option;

if (!$USER->IsAdmin()) {
  $APPLICATION->AuthForm("Доступ запрещён");
}

$APPLICATION->SetTitle("Настройки блоков asdf сайта");

// Переменные для хранения текущих значений
$values = [];

// Если форма была отправлена
if ($_SERVER["REQUEST_METHOD"] == "POST" && check_bitrix_sessid()) {
  // Шапка
  Option::set("main", "HEADER_ENABLE", $_POST['HEADER']['ENABLE'] ?? 'N');
  Option::set("main", "HEADER_BACKGROUND", $_POST['HEADER']['BACKGROUND'] ?? 'white');
  Option::set("main", "HEADER_PHONE", $_POST['HEADER']['PHONE'] ?? '');

  // Подвал
  Option::set("main", "FOOTER_ENABLE", $_POST['FOOTER']['ENABLE'] ?? 'N');
  Option::set("main", "FOOTER_EMAIL", $_POST['FOOTER']['EMAIL'] ?? '');
  Option::set("main", "FOOTER_SOCIAL", $_POST['FOOTER']['SOCIAL'] ?? '');

  // Товар
  Option::set("main", "PRODUCT_SHOW_PRICE", $_POST['PRODUCT']['SHOW_PRICE'] ?? 'Y');
  Option::set("main", "PRODUCT_SHOW_BUTTON", $_POST['PRODUCT']['SHOW_BUTTON'] ?? 'N');

  // Выводим сообщение о успешном сохранении
  echo '<div class="adm-info-message"><p>Настройки успешно сохранены</p></div>';
} else {
  // Читаем из базы
  $values = [
    'HEADER' => [
      'ENABLE'     => Option::get("main", "HEADER_ENABLE", "N"),
      'BACKGROUND' => Option::get("main", "HEADER_BACKGROUND", "white"),
      'PHONE'      => Option::get("main", "HEADER_PHONE", ""),
    ],
    'FOOTER' => [
      'ENABLE' => Option::get("main", "FOOTER_ENABLE", "N"),
      'EMAIL'  => Option::get("main", "FOOTER_EMAIL", ""),
      'SOCIAL' => Option::get("main", "FOOTER_SOCIAL", ""),
    ],
    'PRODUCT' => [
      'SHOW_PRICE'   => Option::get("main", "PRODUCT_SHOW_PRICE", "Y"),
      'SHOW_BUTTON'  => Option::get("main", "PRODUCT_SHOW_BUTTON", "N"),
    ]
  ];
}
?>

<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_admin_after.php");
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

<h1>Настройки блоков сайта</h1>

<form method="post" action="<?= $APPLICATION->GetCurPage() ?>">
  <?= bitrix_sessid_post() ?>

  <h2>Шапка</h2>
  <table class="adm-detail-content-table edit-table">
    <tr>
      <td width="40%">Показывать шапку</td>
      <td><input type="checkbox" name="HEADER[ENABLE]" value="Y" <?php if ($values['HEADER']['ENABLE'] === 'Y') echo "checked"; ?>></td>
    </tr>
    <tr>
      <td>Цвет фона</td>
      <td>
        <select name="HEADER[BACKGROUND]">
          <option value="white" <?php if ($values['HEADER']['BACKGROUND'] === 'white') echo "selected"; ?>>Белый</option>
          <option value="lightblue" <?php if ($values['HEADER']['BACKGROUND'] === 'lightblue') echo "selected"; ?>>Светло-голубой</option>
          <option value="dark" <?php if ($values['HEADER']['BACKGROUND'] === 'dark') echo "selected"; ?>>Темный</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Телефон</td>
      <td><input type="text" name="HEADER[PHONE]" value="<?= htmlspecialcharsbx($values['HEADER']['PHONE']) ?>"></td>
    </tr>
  </table>

  <h2>Подвал</h2>
  <table class="adm-detail-content-table edit-table">
    <tr>
      <td>Показывать подвал</td>
      <td><input type="checkbox" name="FOOTER[ENABLE]" value="Y" <?php if ($values['FOOTER']['ENABLE'] === 'Y') echo "checked"; ?>></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="text" name="FOOTER[EMAIL]" value="<?= htmlspecialcharsbx($values['FOOTER']['EMAIL']) ?>"></td>
    </tr>
    <tr>
      <td>Социальные сети</td>
      <td><input type="text" name="FOOTER[SOCIAL]" value="<?= htmlspecialcharsbx($values['FOOTER']['SOCIAL']) ?>"></td>
    </tr>
  </table>

  <h2>Карточка товара</h2>
  <table class="adm-detail-content-table edit-table">
    <tr>
      <td>Показывать цену</td>
      <td>
        <input type="radio" name="PRODUCT[SHOW_PRICE]" value="Y" <?php if ($values['PRODUCT']['SHOW_PRICE'] !== 'N') echo "checked"; ?>> Да
        <input type="radio" name="PRODUCT[SHOW_PRICE]" value="N" <?php if ($values['PRODUCT']['SHOW_PRICE'] === 'N') echo "checked"; ?>> Нет
      </td>
    </tr>
    <tr>
      <td>Показывать кнопку «В корзину»</td>
      <td><input type="checkbox" name="PRODUCT[SHOW_BUTTON]" value="Y" <?php if ($values['PRODUCT']['SHOW_BUTTON'] === 'Y') echo "checked"; ?>></td>
    </tr>
  </table>

  <input type="submit" value="Сохранить">
</form>

<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/epilog_admin.php");
