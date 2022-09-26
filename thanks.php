<?php
/*
Template Name: Благодарность
*/
?>
<?php
include 'blocks/head.php';
?>
<body>

<div class="overlay overlay-page" id="modal-thank" >
    <div class="modal-wrap modal-big">
        <a href="#" onclick="window.history.go(-1); return false;" class="close not-close"></a>

        <div class="modal">

            <form class="modal__block modal-call col-center rel" action="#">
                <div class="text ber mbs fw4 tac">
                    Ваш запрос успешно отправлен. <br>
                    Мы свяжемся с Вами в ближайшее время и вышлем всю необходимую информацию
                </div>
                <div class="text24 ber msm fw7 tac">
                    А пока ознакомьтесь подробнее:
                </div>

                <div class="thank-block">
                    <div class="thank-block-left">
                        <div class="text21 mbm fw7 tac">
                            <?php the_field('m_voh_1', 2); ?>
                        </div>
                        <div href="<?php the_field('m_vl_1', 2); ?>" class="vid-slider__item video fancy-class" >
                            <div class="vid-slider__img2">
                                <img src="<?php the_field('m_voimg_1', 2); ?>" alt="">
                                <div class="vid-cir"></div>
                            </div>
                        </div>
                        <div class="mbm"></div>

                        <div href="<?php the_field('m_vl_2', 2); ?>" class="vid-slider__item video fancy-class" >
                            <div class="vid-slider__img2">
                                <img src="<?php the_field('m_voimg_2', 2); ?>" alt="">
                                <div class="vid-cir"></div>
                            </div>

                        </div>
                        <div class="msm"></div>

                        <a href="https://www.youtube.com/watch?v=qREjzwZEwHk&list=PLDJArswPfTHNsspP5k_41-xWiAa_Mtomm&ab_channel=%D0%9A%D1%80%D0%BE%D0%BD%D0%BE%D1%81%D0%91%D0%B5%D0%BB%D0%B0%D1%80%D1%83%D1%81%D1%8C%E2%80%A2C%D0%B5%D0%BB%D1%8C%D1%85%D0%BE%D0%B7%D1%82%D0%B5%D1%85%D0%BD%D0%B8%D0%BA%D0%B0" target="_blank" class="catalog-header__more row-center">
                            <div class="small-text fw7 dotted dotted_l white-space black mr">Смотреть все видеообзоры</div>
                            <div class="catalog-header__plus tac col-center text fwb black"></div>
                        </a>
                    </div>


                    <div class="thank-block-left thank-block-left-right">
                        <div class="text21 mbm fw7 tac">
                            Видеоотзывы владельцев техники
                        </div>


                        <div class="thank-block-right-row">

                            <div href="https://www.youtube.com/watch?v=ONiJ_5nshgo&list=PLM3UTh3bUAWnbFQ0SsUR8yqn5WbCr1u9C&index=1" class="vid-slider__item video fancy-class">
                                <div class="vid-slider__img2">
                                    <img src="http://traktortut.by/wp-content/uploads/2021/03/y27.jpg" alt="">
                                    <div class="vid-cir2"></div>
                                </div>
                                <a href="<?php the_field('m_volink_2', 2); ?>" class="link-a tsm13 fw7"><?php the_field('m_votext_2', 2); ?></a>
                            </div>
                            <div class="mbm"></div>

                            <div href="https://www.youtube.com/watch?v=wrJhshCrSg0&list=PLM3UTh3bUAWnbFQ0SsUR8yqn5WbCr1u9C&index=12" class="vid-slider__item video fancy-class">
                                <div class="vid-slider__img2">
                                    <img src="http://traktortut.by/wp-content/uploads/2021/03/y28.jpg" alt="">
                                    <div class="vid-cir2"></div>
                                </div>
                                <a href="<?php the_field('m_volink_2', 2); ?>" class="link-a tsm13 fw7"> Трактор Кентавр Т-224 </a>
                            </div>
                            <div class="mbm"></div>


                        </div>

                        <div class="thank-block-right-row">

                            <div href="https://www.youtube.com/watch?v=aSmUV4ENrXU&list=PLM3UTh3bUAWnbFQ0SsUR8yqn5WbCr1u9C&index=28" class="vid-slider__item video fancy-class">
                                <div class="vid-slider__img2">
                                    <img src="http://traktortut.by/wp-content/uploads/2021/03/y29.jpg" alt="">
                                    <div class="vid-cir2"></div>
                                </div>
                                <a href="<?php the_field('m_volink_2', 2); ?>" class="link-a tsm13 fw7">Картофелесажалка Bomet</a>
                            </div>
                            <div class="mbm"></div>

                            <div href="https://www.youtube.com/watch?v=usDXyeNHJWM&list=PLM3UTh3bUAWnbFQ0SsUR8yqn5WbCr1u9C&index=37" class="vid-slider__item video fancy-class">
                                <div class="vid-slider__img2">
                                    <img src="http://traktortut.by/wp-content/uploads/2021/03/y30.jpg" alt="">
                                    <div class="vid-cir2"></div>
                                </div>
                                <a href="<?php the_field('m_volink_2', 2); ?>" class="link-a tsm13 fw7">Трактор Кентавр Т-24</a>
                            </div>



                        </div>
                        <div class="mbm"></div>
                        <a href="https://www.youtube.com/watch?v=98Q1L6bze28&list=PLDJArswPfTHMP6QVnzKqLji0VKFI48zZh" target="_blank" class="catalog-header__more row-center">
                            <div class="small-text fw7 dotted dotted_l white-space black mr">Смотреть все видеоотзывы</div>
                            <div class="catalog-header__plus tac col-center text fwb black"></div>
                        </a>
                    </div>

                </div>

            </form>
        </div>


    </div>
</div>


<?php
include 'blocks/scripts.php';
?>


</body>
</html>