<?
function renderAboutPreviewSection(array $values): void
{
  $DTO = [
    [
      'TITLE' => 'Общие настройки блока:',
      'ITEMS' => [
        [
          'label' => 'Показывать блок',
          'name' => 'ABOUT_PREVIEW_SECTION_ENABLED',
          'type' => 'checkbox',
          'value' => $values['ABOUT_PREVIEW_SECTION_ENABLED'],
        ],
        [
          'label' => 'Сортировка',
          'name' => 'ABOUT_PREVIEW_SECTION_SORT',
          'type' => 'number',
          'value' => $values['ABOUT_PREVIEW_SECTION_SORT'],
        ],
      ]
    ]
  ];

  renderSettingsBlock('Блок «О компании»', $DTO);
}
