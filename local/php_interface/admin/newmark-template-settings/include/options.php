<?

use Bitrix\Main\Config\Option;

/**
 * Проверяем, был ли отправлен POST-запрос и прошёл ли проверка sessid.
 */
function isFormSubmitted(): bool
{
  return $_SERVER["REQUEST_METHOD"] === "POST" && function_exists('check_bitrix_sessid') && check_bitrix_sessid();
}

/**
 * Возвращаем текущие настройки из опций
 */
function getSettings(): array
{
  return [

    'content-width' => Option::get("main", "content-width", "1680px"),
    'site-base-font-family' => Option::get("main", "site-base-font-family", "var(--montserrat)"),
    'primary-color' => Option::get("main", "primary-color", "var(--primary-color)"),
    'secondary-color' => Option::get("main", "secondary-color", "var(--secondary-color)"),
    'base-border-radius' => Option::get("main", "base-border-radius", "Без скругления"),
    'section-title-color' => Option::get("main", "section-title-color", "var(--dark-color)"),
    'site-bg-color' => Option::get("main", "site-bg-color", "var(--site-bg-color)"),

    'SECTION_TITLE_UNDERLINE_ENABLED' => Option::get("main", "SECTION_TITLE_UNDERLINE_ENABLED", "N"),
    'SECTION_HEADER_ALIGN' => Option::get("main", "SECTION_HEADER_ALIGN", "По центру"),

    'FEATURES_SECTION_TYPE' => Option::get("main", "FEATURES_SECTION_TYPE", "Грид-сетка из пяти элементов"),
    'FEATURES_SECTION_ENABLED' => Option::get("main", "FEATURES_SECTION_ENABLED", "N"),
    'FEATURES_SECTION_SORT' => Option::get("main", "FEATURES_SECTION_SORT", "100"),
  ];
}

/**
 * Сохраняем новые значения настроек из POST
 */
function saveSettings(array $postData): void
{
  $data = [

    'content-width' => $postData["content-width"] ?? "1680px",
    'site-base-font-family' => $postData["site-base-font-family"] ?? "var(--montserrat)",
    'primary-color' => $postData["primary-color"] ?? "var(--primary-color)",
    'secondary-color' => $postData["secondary-color"] ?? "var(--secondary-color)",
    'base-border-radius' => $postData["base-border-radius"] ?? "Без скругления",
    'section-title-color' => $postData["section-title-color"] ?? "var(--dark-color)",
    'site-bg-color' => $postData["site-bg-color"] ?? "var(--site-bg-color)",

    'SECTION_TITLE_UNDERLINE_ENABLED' => $postData["SECTION_TITLE_UNDERLINE_ENABLED"] ?? "N",
    'SECTION_HEADER_ALIGN' => $postData["SECTION_HEADER_ALIGN"] ?? "По центру",


    'FEATURES_SECTION_TYPE' => $postData["FEATURES_SECTION_TYPE"] ?? "1",
    'FEATURES_SECTION_ENABLED' => $postData["FEATURES_SECTION_ENABLED"] ?? "N",
    'FEATURES_SECTION_SORT' => $postData["FEATURES_SECTION_SORT"] ?? "100",
  ];

  foreach ($data as $key => $value) {
    Option::set("main", $key, $value);
  }
}

// --- Основной код ---

$values = getSettings();

if (isFormSubmitted()) {
  saveSettings($_POST);
  $values = getSettings(); // Обновляем после сохранения
}
