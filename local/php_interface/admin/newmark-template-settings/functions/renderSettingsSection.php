<?
function renderSettingsSection(array $values): void
{
  $fields = [
    [
      'TITLE' => 'Основные настройки:',

      'ITEMS' => [
        [
          'label' => 'Логотип сайта:',
          'name' => 'SITE_LOGO',
          'type' => 'file',
          'value' => $values['SITE_LOGO'],
        ],
        [
          'label' => 'Макс. ширина контентной части сайта:',
          'name' => 'content-width',
          'type' => 'select',
          'value' => $values['content-width'],
          'options' => array(
            '1240px' => '1240px',
            '1440px' => '1440px',
            '1680px' => '1680px',
            '1920px' => '1920px',
          ),
        ],
        [
          'label' => 'Базовое скругление элементов:',
          'name' => 'current-border-radius',
          'type' => 'select',
          'value' => $values['current-border-radius'],
          'options' => array(
            '0' => 'Без скругления',
            '5px' => '5px',
            '10px' => '10px',
            '15px' => '15px',
            '30px' => '30px',
          ),
        ],
      ]
    ],
    [
      'TITLE' => 'Типографика:',
      'ITEMS' => [
        [
          'label' => 'Семейство шрифтов:',
          'name' => 'site-base-font-family',
          'type' => 'select',
          'value' => $values['site-base-font-family'],
          'options' => array(
            'var(--montserrat)' => 'Montserrat',
            'var(--roboto)' => 'Roboto',
            'var(--inter)' => 'Inter',
            'var(--manrope)' => 'Manrope',
          ),
        ],
      ],
    ],
    [
      'TITLE' => 'Колористика:',
      'ITEMS' => [
        [
          'label' => 'Основной цвет сайта:',
          'name' => 'primary-color',
          'type' => 'colorpicker',
          'value' => $values['primary-color'],
        ],
        [
          'label' => 'Дополнительный цвет сайта:',
          'name' => 'secondary-color',
          'type' => 'colorpicker',
          'value' => $values['secondary-color'],
        ],
        [
          'label' => 'Цвет фона сайта:',
          'name' => 'site-bg-color',
          'type' => 'colorpicker',
          'value' => $values['site-bg-color'],
        ],
      ]
    ],
    [
      'TITLE' => 'Настройка разделов сайта:',
      'ITEMS' => [
        [
          'label' => 'Позиционирование шапки секции:',
          'name' => 'SECTION_HEADER_ALIGN',
          'type' => 'select',
          'value' => $values['SECTION_HEADER_ALIGN'],
          'options' => array(
            '--section-headers-align-center' => 'По центру',
            '--section-headers-align-left' => 'По левому краю',
            '--section-headers-align-right' => 'По правому краю'
          ),
        ],
        [
          'label' => 'Цвет заголовка раздела:',
          'name' => 'section-title-color',
          'type' => 'select',
          'value' => $values['section-title-color'],
          'options' => array(
            'var(--black-color)' => 'Черный',
            'var(--white-color)' => 'Белый',
            'var(--primary-color)' => 'Основной цвет сайта',
            'var(--secondary-color)' => 'Дополнительный цвет сайта',
          ),
        ],
        [
          'label' => 'Показывать декоративную линию под заголовком:',
          'name' => 'SECTION_TITLE_UNDERLINE_ENABLED',
          'type' => 'checkbox',
          'value' => $values['SECTION_TITLE_UNDERLINE_ENABLED'],
        ],
        [
          'label' => 'Цвет декоративной линии под заголовком:',
          'name' => 'title-underline-color',
          'type' => 'select',
          'value' => $values['title-underline-color'],
          'options' => array(
            'var(--black-color)' => 'Черный',
            'var(--white-color)' => 'Белый',
            'var(--primary-color)' => 'Основной цвет сайта',
            'var(--secondary-color)' => 'Дополнительный цвет сайта',
          ),
        ],
      ]
    ]
  ];

  renderSettingsBlock('Настройки шаблона', $fields);
}
