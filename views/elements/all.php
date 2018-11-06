<!-- Карточка стоимости, с тегами-->
<!-- basic-price-card -->
<div class="basic-price-card">
    <div class="image-wrap">
        <img src="/images/jumbo.png">
    </div>
    <div class="name">name</div>

    <div class="tags">
        <div class="tag">металические</div>
        <div class="tag">керамические</div>
    </div>

    <div class="description">
        описание sd fas fds fasa s ffd asd fs f sf sd fsd s
    </div>

    <div class="price-footer">
        от 22 500 р.
        <span>(на 1 челюсть)</span>
    </div>
</div>
<!--/.basic-price-card-->
<!-- --- --- --- --- --- --- --- -->

<!-- Карточка стоимости, со звездочками-->
<!-- advanced-price-card -->
<div class="advanced-price-card">
    <div class="image-wrap">
        <img src="/images/jumbo.png">
    </div>
    <div class="name">name</div>
    <div class="description">
        описание sd fas fds fasa s ffd asd fs f sf sd fsd s
    </div>
    <div class="star-wrap">
        <div class="row">
            <div class="col-sm-6">Эффективность</div>
            <div class="col-sm-6">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
            </div>
        </div>
    </div>
    <div class="star-wrap">
        <div class="row">
            <div class="col-sm-6">Скорость</div>
            <div class="col-sm-6">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
            </div>
        </div>
    </div>
    <div class="star-wrap">
        <div class="row">
            <div class="col-sm-6">Эстетика</div>
            <div class="col-sm-6">
                <span class="glyphicon glyphicon-star"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
                <span class="glyphicon glyphicon-star-empty"></span>
            </div>
        </div>
    </div>
    <div class="price-footer">
        от 22 500 р.
        <span>(на 1 челюсть)</span>
    </div>
</div>
<!--/.advanced-price-card-->
<!-- --- --- --- --- --- --- --- -->

<!-- Карточка с двумя ценами -->
<div class="two-price-card">
    <div class="title">
        Title
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="line-price-card">
                <div class="description">Description</div>
                <div class="price-value">500 руб</div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="line-price-card">
                <div class="description">Description</div>
                <div class="price-value">500 руб</div>
            </div>
        </div>
    </div>
</div>
<!-- --- --- --- --- --- --- --- -->

<!-- Карточка с акцией -->
<div class="line-price-card with-sale">
    <div class="description"><span class="sale-title">АКЦИЯ!</span> Консультация врача стоматолога-хирурга</div>
    <div class="price-value"><span class="old-price">&nbsp;500 руб&nbsp;</span><span class="price-value-with-sale">300 руб</span></div>
</div>
<!-- --- --- --- --- --- --- --- -->

<!-- Карточка с шагом -->
<div class="step-card">
    <div class="number">1</div>
    <div class="title">Диагностика</div>
    <div class="arrow"></div>
    <div class="description">Перед началом любого лечения мы делаем 3D
        снимок. Это залог успеха. Без снимка мы
        никогда не начинаем работать</div>
</div>
<!-- --- --- --- --- --- --- --- -->

<!-- Карточка вертикальная с шагом -->
<div class="vertical-step-card">
    <div class="number">1</div>
    <div class="description">Внимательное обследование пациента, точность диагностики, определение индивидуального плана лечения, конструкция ортодонтического аппарата обеспечивают успех ортодонтического лечения.</div>
</div>
<!-- --- --- --- --- --- --- --- -->

<!-- Списки-->
<div class="li-dot">
    <ul>
        <li>fdsfsf</li>
    </ul>
</div>

<div class="li-plus">
    <ul>
        <li>fdsfsf</li>
    </ul>
</div>

<div class="li-minus">
    <ul>
        <li>fdsfsf</li>
    </ul>
</div>
<!-- --- --- --- --- --- --- --- -->

<!-- Модальное окно-->
<?=\app\widgets\CallbackWidget::widget([
    'toggleButtonClass' => 'btn btn-top'
])?>
<!-- --- --- --- --- --- --- --- -->

<!-- COLLAPSE START -->
<div class="row">

    <div class="col-sm-4">

        <div class="pre-image-collapse">
            <img src="https://globalsouvenir.ru/uploads/no-img.jpg">
        </div>

        <div class="pre-title-collapse">MAIN TITLE 1-3</div>

        <!-- BLOCK#1 -->
        <div class="panel-group collapse in" aria-expanded="true">

            <!-- PANEL#1 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="collapse-toggle collapsed" href="#collapse-1" data-toggle="collapse" data-parent="#w0" aria-expanded="false">TITLE#1</a>
                    </h4>
                </div>
                <div id="collapse-1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        CONTENT#1
                    </div>
                </div>
            </div>

            <!-- PANEL#2 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="collapse-toggle collapsed" href="#collapse-2" data-toggle="collapse" data-parent="#w0" aria-expanded="false">TITLE#2</a>
                    </h4>
                </div>
                <div id="collapse-2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        CONTENT#2
                    </div>
                </div>
            </div>

            <!-- PANEL#3 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="collapse-toggle collapsed" href="#collapse-3" data-toggle="collapse" data-parent="#w0" aria-expanded="false">TITLE#3</a>
                    </h4>
                </div>
                <div id="collapse-3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        CONTENT#3
                    </div>
                </div>
            </div>

        </div>
        <!--/BLOCK#1 -->

    </div>

    <div class="col-sm-4">

        <div class="pre-image-collapse">
            <img src="https://globalsouvenir.ru/uploads/no-img.jpg">
        </div>

        <div class="pre-title-collapse">MAIN TITLE 4-6</div>

        <!-- BLOCK#2 -->
        <div class="panel-group collapse in" aria-expanded="true">

            <!-- PANEL#1 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="collapse-toggle collapsed" href="#collapse-4" data-toggle="collapse" data-parent="#w0" aria-expanded="false">TITLE#4</a>
                    </h4>
                </div>
                <div id="collapse-4" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        CONTENT#4
                    </div>
                </div>
            </div>

            <!-- PANEL#2 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="collapse-toggle collapsed" href="#collapse-5" data-toggle="collapse" data-parent="#w0" aria-expanded="false">TITLE#5</a>
                    </h4>
                </div>
                <div id="collapse-5" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        CONTENT#5
                    </div>
                </div>
            </div>

            <!-- PANEL#3 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="collapse-toggle collapsed" href="#collapse-6" data-toggle="collapse" data-parent="#w0" aria-expanded="false">TITLE#6</a>
                    </h4>
                </div>
                <div id="collapse-6" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        CONTENT#6
                    </div>
                </div>
            </div>

        </div>
        <!--/BLOCK#2 -->

    </div>

    <div class="col-sm-4">

        <div class="pre-image-collapse">
            <img src="https://globalsouvenir.ru/uploads/no-img.jpg">
        </div>

        <div class="pre-title-collapse">MAIN TITLE 7-9</div>

        <!-- BLOCK#3 -->
        <div class="panel-group collapse in" aria-expanded="true">

            <!-- PANEL#1 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="collapse-toggle collapsed" href="#collapse-7" data-toggle="collapse" data-parent="#w0" aria-expanded="false">TITLE#7</a>
                    </h4>
                </div>
                <div id="collapse-7" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        CONTENT#7
                    </div>
                </div>
            </div>

            <!-- PANEL#2 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="collapse-toggle collapsed" href="#collapse-8" data-toggle="collapse" data-parent="#w0" aria-expanded="false">TITLE#8</a>
                    </h4>
                </div>
                <div id="collapse-8" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        CONTENT#8
                    </div>
                </div>
            </div>

            <!-- PANEL#3 -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="collapse-toggle collapsed" href="#collapse-9" data-toggle="collapse" data-parent="#w0" aria-expanded="false">TITLE#9</a>
                    </h4>
                </div>
                <div id="collapse-9" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="panel-body">
                        CONTENT#9
                    </div>
                </div>
            </div>

        </div>
        <!--/BLOCK#3 -->

    </div>

</div>
<!--/COLLAPSE END -->
