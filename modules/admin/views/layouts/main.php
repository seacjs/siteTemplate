<?php
echo $this->render('_prototype', [
    'content' => $content,
    'layoutOptions' => [
        'nav-bar' => true,
        'breadcrumbs' => true,
        'alert' => true,
        'footer' => true
    ]
]);