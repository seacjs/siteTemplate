<?php
echo $this->render('_prototype',[
    'content' => $content,
    'layoutOptions' => [
        'nav-bar' => false,
        'breadcrumbs' => false,
        'alert' => false,
        'footer' => false
    ]
]);