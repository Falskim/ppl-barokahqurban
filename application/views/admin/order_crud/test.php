<html>
<head>
<title>Records</title>
</head>
<body>

<h3>Order Records!</h3>

<?php foreach ($orders as $order):?>
<ul>
    <?php foreach ($order as $item => $value):?>
    <li><?php echo $item;?>: <?php echo $value;?></li>
    <?php endforeach; ?>
</ul>
<?php endforeach; ?>

</body>
</html>