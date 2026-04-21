<?php include 'header.php'; ?>

<?php
$products = [
    [
        'name' => '키보드',
        'price' => 30000,
        'stock' => 10
    ],
    [
        'name' => '마우스',
        'price' => 15000,
        'stock' => 3
    ],
    [
        'name' => '모니터',
        'price' => 120000,
        'stock' => 0
    ]
];

function getStockMessage($stock)
{
    if ($stock >= 5) {
        return ['msg' => '재고 충분', 'class' => 'good'];
    } elseif ($stock >= 1) {
        return ['msg' => '재고 부족', 'class' => 'low'];
    } else {
        return ['msg' => '품절', 'class' => 'out'];
    }
}

$totalAmount = 0;
?>

<table>
    <tr>
        <th>상품명</th>
        <th>가격</th>
        <th>재고</th>
        <th>재고 상태</th>
    </tr>

    <?php foreach ($products as $product): ?>
        <?php
            $stockInfo = getStockMessage($product['stock']);
            $totalAmount += $product['price'] * $product['stock'];
        ?>
        <tr>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo number_format($product['price']); ?>원</td>
            <td><?php echo $product['stock']; ?>개</td>
            <td class="<?php echo $stockInfo['class']; ?>">
                <?php echo $stockInfo['msg']; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<div class="summary">
    <strong>총 재고 금액:</strong>
    <?php echo number_format($totalAmount); ?>원
</div>

<?php include 'footer.php'; ?>
