<?php

use yii\bootstrap\Html;
use yii\bootstrap\Modal;
use yii\web\View;

/* @var $this yii\web\View */

/* SEO START*/

$seo = \app\models\Seo::find()
    ->select(['slug','title','description','keywords','h1'])
    ->where(['slug'=>'main'])
    ->one();

$this->title = $seo->title;
$this->registerMetaTag(['name' => 'keywords', 'content' => $seo->keywords], 'keywords');
$this->registerMetaTag(['name' => 'description', 'content' => $seo->description], 'description');

/* SEO END*/


?>

<?=\app\widgets\JumboSection::widget(['h1' => $seo->h1]);?>

<!-- ------------------ -->

<div class="clearfix"></div>


<?=\app\widgets\SalesSection::widget([
    'sales' => $sales,
]);?>

<!-- ------------------ -->

<!--<div class="container">-->
<!---->
<!--    --><?php //echo $this->render('@app/views/elements/all') ?>
<!---->
<!--</div>-->

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


<?=\app\widgets\BlogSection::widget([
    'blogs' => $blogs,
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




