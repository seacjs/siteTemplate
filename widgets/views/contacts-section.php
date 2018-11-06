<?php



?>


<section class="section">
    <div class="container">
        <h2>Контакты</h2>

        <div class="map-wrap">
            <div class="map-inner">
                <div class="map">
<!-- https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3AeaXlHc75D7E8CYjmolHemOKo2jtAS6Jg&amp;width=100%25&amp;height=480&amp;lang=ru_RU&amp;scroll=false    -->
<!--                    <script type="text/javascript" charset="utf-8" async src=""></script>-->

                    <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%<?=$settings->map?>&amp;width=100%25&amp;height=480&amp;lang=ru_RU&amp;scroll=true"></script>
                </div>
                <div class="map-info-wrap">
                    <div class="map-info">

                        <div class="map-info-main-title">«Наша Стоматология»</div>
                        <div class="map-info-title">Адрес:</div>
                        <div class="map-info-description"><?=$settings->address?></div>

                        <div class="map-info-main-title"><?=$settings->phone?></div>
                        <div class="map-info-title">Мы работаем:</div>
                        <div class="map-info-description"><?=$settings->work_time?><br><?=$settings->work_days?></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>