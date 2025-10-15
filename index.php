<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/header.php';

$res = $mysqli->query("SELECT * FROM products ORDER BY created_at DESC");
$products = $res->fetch_all(MYSQLI_ASSOC);
?>
<div class="row">
<?php foreach($products as $p): ?>
  <div class="col-md-4 mb-3">
    <div class="card h-100">
      <?php if($p['image']): ?>
        <img src="/moto_shop_demo/public/<?= esc($p['image']) ?>" class="card-img-top" style="height:220px;object-fit:cover;">
      <?php else: ?>
        <div class="bg-secondary" style="height:220px;"></div>
      <?php endif; ?>
      <div class="card-body d-flex flex-column">
        <h5 class="card-title"><?= esc($p['name']) ?></h5>
        <p class="text-muted small"><?= esc($p['brand']) ?> • <?= esc($p['area']) ?></p>
        <p class="fw-bold mt-auto"><?= number_format($p['price'],0,',','.') ?>₫</p>
        <div class="mt-2">
          <a href="product_detail.php?id=<?= $p['id'] ?>" class="btn btn-outline-primary btn-sm">Chi tiết</a>
          <form method="post" action="cart.php" class="d-inline">
            <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
            <input type="hidden" name="qty" value="1">
            <button name="add" class="btn btn-brand btn-sm">Thêm vào giỏ</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>
<?php require_once __DIR__ . '/../includes/footer.php'; ?>
