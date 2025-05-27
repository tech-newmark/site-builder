<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if ($arResult["ITEMS"] && $GLOBALS['CLIENTS_PREVIEW_SECTION_ENABLED'] === "Y"): ?>
  <section
    class="
      base-section clients-preview 
      <?= $arResult["RES_MOD_MODIFIERS"] ?>
    "
    style="order: <?= $GLOBALS['CLIENTS_PREVIEW_SECTION_SORT'] ?>">
    <div class="container">
      <div class="base-section__header">
        <h2 class="base-section__header-title"><?= $arResult["NAME"] ?></h2>
        <? if ($arResult["DESCRIPTION"]): ?>
          <span class="base-section__header-text">
            <?= $arResult["DESCRIPTION"] ?>
          </span>
        <? endif; ?>
      </div>

      <? if ($GLOBALS["CLIENTS_PREVIEW_SECTION_VIEW"] === 1 && $GLOBALS['CLIENTS_PREVIEW_FULLWIDTH_SLIDER'] === '--fullwidth'): ?>
    </div>
    <div class="container-fluid">
    <? endif; ?>
    <? if ($GLOBALS["CLIENTS_PREVIEW_SECTION_VIEW"] === '1'): ?>
      <div class="swiper infinity-row-slider <?= $arResult["RES_MOD_GRID_MODIFIERS"] ?>">
        <div class="swiper-wrapper">
          <? foreach ($arResult["ITEMS"] as $arItem):
            $iconPath = CFile::GetPath($arItem["PROPERTIES"]["ICON"]["VALUE"]);
          ?>
            <div class="swiper-slide">
              <img src="<?= $iconPath ?>" alt="<?= $arItem["NAME"] ?>" width="200" height="120">
            </div>
          <? endforeach; ?>
        </div>
      </div>
    <? endif; ?>

    <? if ($GLOBALS["CLIENTS_PREVIEW_SECTION_VIEW"] === '2'): ?>
      <div class="clients-preview__grid <?= $arResult["RES_MOD_GRID_MODIFIERS"] ?>">
        <? foreach ($arResult["ITEMS"] as $arItem):
          $iconPath = CFile::GetPath($arItem["PROPERTIES"]["ICON"]["VALUE"]);
        ?>
          <div class="clients-preview__grid-item">
            <img src="<?= $iconPath ?>" alt="<?= $arItem["NAME"] ?>" width="200" height="120">
          </div>
        <? endforeach; ?>
      </div>
    <? endif ?>

    </div>
  </section>
<? endif; ?>