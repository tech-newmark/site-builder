<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if ($arResult["ITEMS"] && $GLOBALS['FEATURES_SECTION_ENABLED'] === "Y"): ?>
  <section
    class="
      base-section features 
      <?= ($GLOBALS['SECTION_TITLE_UNDERLINE_ENABLED'] === "Y") ? '--underlined' : '' ?>
    "
    style="order: <?= $GLOBALS['FEATURES_SECTION_SORT'] ?>">
    <div class="container">
      <div class="base-section__header">
        <h2 class="base-section__header-title"><?= $arResult["NAME"] ?></h2>
        <? if ($arResult["DESCRIPTION"]): ?>
          <span class="base-section__header-text">
            <?= $arResult["DESCRIPTION"] ?>
          </span>
        <? endif; ?>
      </div>
      <div class="features__grid-container">
        <div class="features__grid features__grid--type-<?= $GLOBALS['FEATURES_SECTION_TYPE'] ?>">
          <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <div class="features__grid-item">
              <div
                class="feature-card  <?= $arItem["RES_MOD_MODIFIERS"] ?>"
                style="<?= ($arItem["PREVIEW_PICTURE"]["SRC"] ? 'background-image:url(' . $arItem['PREVIEW_PICTURE']['SRC'] . ')' : '') ?>">
                <div class="feature-card__wrapper">
                  <?
                  if ($arItem["PROPERTIES"]["ICON"]["VALUE"]):
                    $iconPath = CFile::GetPath($arItem["PROPERTIES"]["ICON"]["VALUE"]);
                  ?>
                    <img src="<?= $iconPath ?>" alt="<?= $arItem["NAME"] ?>" width="32" height="32">
                  <? endif; ?>
                  <span class="base-subtitle">
                    <?= $arItem["NAME"] ?>
                  </span>
                  <? if ($arItem["PREVIEW_TEXT"]): ?>
                    <span class="base-text">
                      <?= $arItem["PREVIEW_TEXT"] ?>
                    </span>
                  <? endif; ?>
                </div>
              </div>
            </div>
          <? endforeach; ?>
        </div>
      </div>
  </section>
<? endif; ?>