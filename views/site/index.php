<?php

use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use yii\web\View;


/* @var $this yii\web\View */

$this->title = "Наша Стоматология";
//$this->registerMetaTag(['name' => 'keywords', 'content' => 'yii, framework, php'], 'keywords');
//$this->registerMetaTag(['name' => 'description', 'content' => ''], 'description');

?>

<?=\app\widgets\JumboSection::widget();?>

<!-- ------------------ -->

<div class="clearfix"></div>


<?=\app\widgets\SalesSection::widget([
    'sales' => $sales,
]);?>


<!-- ------------------ -->

<?=\app\widgets\ServicesSection::widget([
    'services' => $services,
]);?>

<!-- ------------------ -->


<?=\app\widgets\ExamplesSection::widget([
    'examples' => $examples,
]);?>


<!-- ------------------ -->

<?=\app\widgets\ReviewsSection::widget([
    'reviews' => $reviews,
]);?>

<!-- ------------------ -->

<?=\app\widgets\DoctorsSection::widget([
    'doctors' => $doctors,
]);?>

<!-- ------------------ -->
<?=\app\widgets\SertificateSection::widget();?>
<?=\app\widgets\InteriorSection::widget();?>

<!-- ------------------ -->

<?=\app\widgets\ContactsSection::widget([
    'settings' => $settings,
]);?>




