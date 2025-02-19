<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>

<div class="container">
    <div class="row">
        <?php foreach ($products as $product): ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
                <div class="card w-100 shadow-sm">
                    <img src="<?= Html::encode($product->img) ?>" class="card-img-top"
                        alt="<?= Html::encode($product->title) ?>">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= Html::encode($product->title) ?></h5>
                        <p class="card-text flex-grow-1"><?= Html::encode($product->description) ?></p>
                        <a href="<?= Url::to(['mos/indexId', 'id' => $product->id]) ?>" class="btn btn-primary w-100 mt-auto">
                            <p class="card-text flex-grow-1"><?= Html::encode($product->price) ?></p>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>