<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if ($arResult["ITEMS"] && $GLOBALS['ABOUT_PREVIEW_SECTION_ENABLED'] === "Y"): ?>
  <section
    class="
      base-section about 
      <?= $arResult["RES_MOD_MODIFIERS"] ?>
    "
    style="order: <?= $GLOBALS['ABOUT_PREVIEW_SECTION_SORT'] ?>">

    <div class="container">
      <div class="base-section__header">
        <h2 class="base-section__header-title"><?= $arResult["NAME"] ?></h2>
      </div>

      <div class="about__grid-container">
        <div class="about__grid <?= $arResult["RES_MOD_GRID_MODIFIERS"] ?>">
          <? if ($arResult["PICTURE"]):
            $picturePath = CFile::GetPath($arResult["PICTURE"]);
          ?>
            <div class="about__grid-item">
              <img src="<?= $picturePath ?>" alt="<?= $arResult["NAME"] ?>" height="570" width="760">
            </div>

            <div class="about__grid-item">
            <? endif; ?>

            <? if ($arResult["DESCRIPTION"]): ?>
              <p><?= $arResult["DESCRIPTION"] ?></p>
            <? endif; ?>

            <? if ($arResult["ITEMS"]): ?>
              <div class="about__features-list <?= $arResult["RES_MOD_LIST_MODIFIERS"] ?>">
                <? foreach ($arResult["ITEMS"] as $arItem): ?>
                  <div class="simple-card">
                    <span class="base-subtitle"><?= $arItem["NAME"] ?></span>
                    <span class="base-text"><?= $arItem["PREVIEW_TEXT"] ?></span>
                  </div>
                <? endforeach; ?>
              </div>
            <? endif; ?>
            </div>
            <? if ($arResult["PICTURE"]): ?>
        </div>
      <? endif; ?>
      </div>
    </div>
  </section>
<? endif; ?>