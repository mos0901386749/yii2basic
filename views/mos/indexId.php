<?php
use yii\helpers\Html;
?>

<div class="container mt-5">
    <div class="row align-items-center">
        <!-- รูปภาพสินค้า -->
        <div class="col-md-5">
            <div class="p-4 bg-light rounded shadow-lg">
                <img src="<?= Html::encode($productId->img) ?>" class="img-fluid rounded" alt="<?= Html::encode($productId->title) ?>">
            </div>
        </div>

        <!-- ข้อมูลสินค้า -->
        <div class="col-md-7">
            <h2 class="fw-bold"><?= Html::encode($productId->title) ?></h2>
            <p class="text-secondary"><?= Html::encode($productId->description) ?></p>

            <div class="input-group mb-3" style="max-width: 200px;">
    <button class="btn btn-outline-secondary" type="button" onclick="changeQuantity(-1)">-</button>
    <input type="text" class="form-control text-center" value="1" id="quantity" readonly>
    <button class="btn btn-outline-primary" type="button" onclick="changeQuantity(1)">+</button>
</div>

<script>
    function changeQuantity(amount) {
        let quantityInput = document.getElementById('quantity');
        let currentValue = parseInt(quantityInput.value);

        // ป้องกันค่าติดลบ
        let newValue = currentValue + amount;
        if (newValue < 1) newValue = 1;

        quantityInput.value = newValue;
    }
</script>


            <!-- ปุ่มราคา -->
            <a href="#" class="btn btn-success w-100 d-flex flex-column align-items-center py-3 mt-4">
                <p class="fs-5 fw-bold text-white"><?= number_format($productId->price, 2) ?> บาท</p>
            </a>
        </div>
    </div>
</div>
