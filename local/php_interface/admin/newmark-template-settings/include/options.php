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

    'FEATURES_SECTION_TYPE' => Option::get("main", "FEATURES_SECTION_TYPE", "1"),
    'FEATURES_SECTION_ENABLED' => Option::get("main", "FEATURES_SECTION_ENABLED", "N"),
    'FEATURES_SECTION_SORT' => Option::get("main", "FEATURES_SECTION_SORT", "100"),
    'FEATURES_SECTION_VIEW' => Option::get("main", "FEATURES_SECTION_VIEW", "С заливкой фоном или изображением"),
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

    'FEATURES_SECTION_TYPE' => $postData["FEATURES_SECTION_TYPE"] ?? "1",
    'FEATURES_SECTION_ENABLED' => $postData["FEATURES_SECTION_ENABLED"] ?? "N",
    'FEATURES_SECTION_SORT' => $postData["FEATURES_SECTION_SORT"] ?? "100",
    'FEATURES_SECTION_VIEW' => $postData["FEATURES_SECTION_VIEW"] ?? "С заливкой фоном или изображением",
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
