<?
function renderSelect(string $name, array $options, $selectedValue = null): string
{
  $html = "<select name=\"$name\">\n";

  foreach ($options as $value => $label) {
    $value = (string)$value;
    $isSelected = ($value === (string)$selectedValue) ? 'selected' : '';
    $html .= "<option value=\"$value\" $isSelected>$label</option>\n";
  }

  $html .= "</select>";

  return $html;
}
