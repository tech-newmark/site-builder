<?
function renderCheckbox(string $name, $isChecked = false): string
{
  $isChecked = $isChecked === 'Y' ? 'checked' : '';

  return "
        <input type=\"checkbox\" name=\"$name\" value=\"Y\" $isChecked>
    ";
}
