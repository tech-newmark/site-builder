<?
function renderTextInput(string $name, string $value, string $type = 'text'): void
{
  echo "
        <input type=\"$type\" name=\"$name\" value=\"$value\"> 
    ";
}
