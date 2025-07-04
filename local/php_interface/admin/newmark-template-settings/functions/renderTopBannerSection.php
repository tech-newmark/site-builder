<?
function renderTopBannerSection(array $values): void
{
  $DTO = [
    [
      'TITLE' => 'Верхний блок с баннером:',
      'ITEMS' => [
        [
          'label' => 'Вид отображения блока',
          'name' => 'TOP_BANNER_HEIGHT',
          'type' => 'select',
          'value' => $values['TOP_BANNER_HEIGHT'],
          'options' => array(
            '--fullheight' => 'На всю высоту экрана',
            '--height-30' => 'На 30% высоты экрана',
            '--height-50' => 'На 50% высоты экрана',
            '--height-70' => 'На 70% высоты экрана',
          ),
        ],

      ]
    ]
  ];

  renderSettingsBlock('Верхний блок с баннером', $DTO);
}
