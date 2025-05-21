<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();


if ($arResult["ITEMS"] && $GLOBALS['FEATURES_SECTION_ENABLED'] === "Y"): ?>
  <section
    class="
      base-section about 
      <?= ($GLOBALS['SECTION_TITLE_UNDERLINE_ENABLED'] === "Y") ? '--underlined' : '' ?>
      <?= $arResult["RES_MOD_MODIFIERS"] ?>
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

      <div class="about__grid-container">
        <div class="about__grid">
          <div class="about__grid-item">
            <img src="./assets/img/about-mock-img.png" alt="about-img" height="570" width="760">
          </div>
          <div class="about__grid-item">
            <p>Наша студия интерьеров была основана с целью создания уютных, стильных и функциональных пространств, которые приносят радость и вдохновение каждому дню. За годы работы мы накопили огромный опыт и реализовали множество проектов различной сложности, от небольших квартир до больших загородных домов. Мы гордимся тем, что наши клиенты довольны результатом и рекомендуют нас своим друзьям и знакомым.</p>
            <div class="about__features-list">
              <div class="simple-card"><span class="base-subtitle">Качество и надежность</span><span class="base-text">Мы используем только высококачественные материалы и современные технологии, чтобы гарантировать долговечность и надежность наших проектов.</span></div>
              <div class="simple-card"><span class="base-subtitle">Индивидуальный подход</span><span class="base-text">Мы внимательно слушаем каждого клиента, чтобы понять его потребности и предложить наилучшие решения.</span></div>
              <div class="simple-card"><span class="base-subtitle">Креативность и инновации</span><span class="base-text">Мы постоянно ищем новые идеи и решения, чтобы создавать интерьеры, которые выделяются своей оригинальностью и современностью.</span></div>
              <div class="simple-card"><span class="base-subtitle">Ответственность и пунктуальность</span><span class="base-text">Мы ценим время наших клиентов и стремимся выполнять все работы в оговоренные сроки.</span></div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="about__grid-container">
        <div class="about__grid --align-center">
          <p>Наша студия интерьеров была основана с целью создания уютных, стильных и функциональных пространств, которые приносят радость и вдохновение каждому дню. За годы работы мы накопили огромный опыт и реализовали множество проектов различной сложности, от небольших квартир до больших загородных домов. Мы гордимся тем, что наши клиенты довольны результатом и рекомендуют нас своим друзьям и знакомым.</p>
          <div class="about__features-list">
            <div class="simple-card"><span class="base-subtitle">Качество и надежность</span><span class="base-text">Мы используем только высококачественные материалы и современные технологии, чтобы гарантировать долговечность и надежность наших проектов.</span></div>
            <div class="simple-card"><span class="base-subtitle">Индивидуальный подход</span><span class="base-text">Мы внимательно слушаем каждого клиента, чтобы понять его потребности и предложить наилучшие решения.</span></div>
            <div class="simple-card"><span class="base-subtitle">Креативность и инновации</span><span class="base-text">Мы постоянно ищем новые идеи и решения, чтобы создавать интерьеры, которые выделяются своей оригинальностью и современностью.</span></div>
            <div class="simple-card"><span class="base-subtitle">Ответственность и пунктуальность</span><span class="base-text">Мы ценим время наших клиентов и стремимся выполнять все работы в оговоренные сроки.</span></div>
          </div>
        </div>
      </div>
      <div class="about__grid-container">
        <div class="about__grid --reversed">
          <div class="about__grid-item"><img src="./assets/img/about-mock-img.png" alt="about-img" height="570" width="760"></div>
          <div class="about__grid-item">
            <div class="about__features-list --column">
              <div class="simple-card"><span class="base-subtitle">Качество и надежность</span><span class="base-text">Мы используем только высококачественные материалы и современные технологии, чтобы гарантировать долговечность и надежность наших проектов.</span></div>
              <div class="simple-card"><span class="base-subtitle">Индивидуальный подход</span><span class="base-text">Мы внимательно слушаем каждого клиента, чтобы понять его потребности и предложить наилучшие решения.</span></div>
              <div class="simple-card"><span class="base-subtitle">Креативность и инновации</span><span class="base-text">Мы постоянно ищем новые идеи и решения, чтобы создавать интерьеры, которые выделяются своей оригинальностью и современностью.</span></div>
              <div class="simple-card"><span class="base-subtitle">Ответственность и пунктуальность</span><span class="base-text">Мы ценим время наших клиентов и стремимся выполнять все работы в оговоренные сроки.</span></div>
            </div>
          </div>
        </div>
      </div>
      <div class="about__grid-container">
        <div class="about__grid --align-center">
          <div class="about__grid-item">
            <img src="./assets/img/about-mock-img.png" alt="about-img" height="570" width="760">
          </div>
          <div class="about__grid-item">
            <p>Наша студия интерьеров была основана с целью создания уютных, стильных и функциональных пространств, которые приносят радость и вдохновение каждому дню. За годы работы мы накопили огромный опыт и реализовали множество проектов различной сложности, от небольших квартир до больших загородных домов. Мы гордимся тем, что наши клиенты довольны результатом и рекомендуют нас своим друзьям и знакомым.</p>
          </div>
        </div>
      </div> -->
    </div>
  </section>



  </section>
<? endif; ?>