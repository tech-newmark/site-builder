<?
function renderSettingsBlock(string $title, array $DTO): void
{
  echo "<fieldset class='settings-form-section'>";
  echo "<h2 class='settings-form-section-title'>$title</h2>";

  foreach ($DTO as $fields) {
    echo '<div class="settings-form-section-field">';
    echo "<span class='settings-form-section-field-title'>" . $fields['TITLE'] . "</span>";
    foreach ($fields['ITEMS'] as $field) {
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
    echo '</div>';
  }

  echo '</fieldset>';
}
