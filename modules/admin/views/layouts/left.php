<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Administrator</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
<!--        <form action="#" method="get" class="sidebar-form">-->
<!--            <div class="input-group">-->
<!--                <input type="text" name="q" class="form-control" placeholder="Search..."/>-->
<!--              <span class="input-group-btn">-->
<!--                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>-->
<!--                </button>-->
<!--              </span>-->
<!--            </div>-->
<!--        </form>-->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Наша стоматлогия', 'options' => ['class' => 'header']],

                    ['label' => 'Оборудование','icon' => 'wrench', 'url' => ['/admin/article/index']],
                    ['label' => 'Акции','icon' => 'tags', 'url' => ['/admin/sales/index']],
                    ['label' => 'Блог','icon' => 'edit', 'url' => ['/admin/blog/index']],
                    ['label' => 'Сертификаты', 'icon' => 'file-text-o','url' => ['/admin/sertificate/index']],
                    ['label' => 'Интерьер', 'icon' => 'file-image-o','url' => ['/admin/interior/index']],

                    ['label' => 'Услуги', 'options' => ['class' => 'header']],

                    ['label' => 'Услуги','icon' => 'hospital-o', 'url' => ['/admin/service/index']],
                    ['label' => 'Цены', 'icon' => 'ruble','url' => ['/admin/price/index']],
                    ['label' => 'Врачи', 'icon' => 'users','url' => ['/admin/doctor/index']],
                    ['label' => 'Отзывы','icon' => 'commenting-o', 'url' => ['/admin/review/index']],
                    ['label' => 'Примеры работ','icon' => 'archive', 'url' => ['/admin/example/index']],

                    ['label' => 'Управление', 'options' => ['class' => 'header']],
                    // todo: pararms
                    ['label' => 'Настройки', 'icon' => 'cog', 'url' => ['/admin/settings/index']],
                    ['label' => 'Настройки', 'icon' => 'cog', 'url' => ['/admin/default/change-password']],
                    ['label' => 'Seo', 'icon' => 'tasks','url' => ['/admin/seo/index']],

//                    ['label' => 'Основное', 'items' => [
//                        ['label' => 'Seo', 'icon' => 'tasks','url' => ['/admin/seo/index']],
//                    ]],



//                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
//                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
//


                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                    ['label' => 'Выйти', 'icon' => 'sign-out', 'url' => ['/admin/default/logout'], 'visible' => !Yii::$app->user->isGuest]


                ],
            ]
        ) ?>

    </section>

</aside>
