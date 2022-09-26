<div class="section opt" id="opt">
		<div class="lines">
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
			<div class="lines__item"></div>
		</div>
		<form data-download-catalog-form data-yandex-key="download_catalog" data-google-key="download_catalog" id="download-catalog-form" class="container-big opt-cont psr">

			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/about/opt.svg" alt="" class="opt-img">
			<div class="opt-lmond">
				<div class="t-min rel fw4 mbm  tal">
					<?php the_field('opt_text1', 2); ?>
					<div class="fl-dot"></div>
				</div>

				<div class="t-min ttu mb fwb">
					<?php the_field('opt_text2', 2); ?>
				</div>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/moc.png" alt="" class="opt-mock">
<!--				<img src="--><?php //the_field('opt_img', 2); ?><!--" alt="" class="opt-mock-pdf">-->
				<p class="tsm13 opt-left__small-text lhm mb">
					<?php the_field('opt_text', 2); ?>
				</p>

        <div class="form">
        	<input type="hidden" name="typecatalog" value="catalog-rozn">
          <input type="hidden" name="title" value='Скачка розничного каталога'>
          <input type="hidden" name="form" value='catalog'>
          <div class="form__row form__row_align-bottom">
            <label class="input form__input form__input_one">
              <span class="input__title input__title">Введите номер Вашего телефона:*</span>
              <input type="tel" class="input__input" name="phone">
            </label>
            <button class="btn inp-cm">
                <span class="btn-blick"></span>
              <span class="tsm13 black fw4">Скачать каталог </span>
            </button>
          </div>
        </div>

				<div class="opt-lmond-form v2">
          <a href="#" data-policy-link class="tsm10 btn-politics-js  tac mbm gray inp-c">

         </a>

					<div class="tsm10 tac mbm gray inp-cm">PDF 2.4 Мб • Обновлен <span class="">15.09.2022</span></div>
				</div>
			</div>
		</form>
	</div>