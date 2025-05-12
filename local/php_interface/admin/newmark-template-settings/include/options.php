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
    'OPTION_BORDER_RADIUS' => Option::get("main", "OPTION_BORDER_RADIUS", "Без скругления"),
    'FEATURES_SECTION_TYPE' => Option::get("main", "FEATURES_SECTION_TYPE", "1"),
    'FEATURES_SECTION_ENABLED' => Option::get("main", "FEATURES_SECTION_ENABLED", "N"),
  ];
}

/**
 * Сохраняем новые значения настроек из POST
 */
function saveSettings(array $postData): void
{
  $data = [
    'OPTION_BORDER_RADIUS' => $postData["OPTION_BORDER_RADIUS"] ?? "Без скругления",
    'FEATURES_SECTION_TYPE' => $postData["FEATURES_SECTION_TYPE"] ?? "1",
    'FEATURES_SECTION_ENABLED' => $postData["FEATURES_SECTION_ENABLED"] ?? "N",
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
