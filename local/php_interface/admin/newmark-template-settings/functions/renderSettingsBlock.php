<?
function renderSettingsBlock(string $title, array $fields): void
{
  echo "<fieldset class='settings-form-field'>";
  echo "<h2 class='settings-form-field-title'>$title</h2>";

  foreach ($fields as $field) {
    $type = $field['type'] ?? 'text';
    $name = $field['name'] ?? '';
    $label = $field['label'] ?? '';
    $value = $field['value'] ?? null;
    $options = $field['options'] ?? [];

    echo '<div class="settings-form-ctrl">';
    echo "<span class='settings-form-label'>$label</span>";

    echo match ($type) {
      'select' => renderSelect($name, $options, $value),
      'checkbox' => renderCheckbox($name, $value),
      'colorpicker' => renderColorpicker($name, $value),
      default => "Неизвестный тип поля: $type",
    };
    echo '</div>';
  }

  echo '</fieldset>';
}
