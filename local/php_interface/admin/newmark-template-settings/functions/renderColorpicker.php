<?
function renderColorpicker(string $name, string $value): void
{
  echo "
        <input type=\"color\" name=\"$name\" value=\"$value\">
    ";
}
