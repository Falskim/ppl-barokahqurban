<html>

<head>
    <title>Records</title>
</head>

<body>

    <h3>Donation Records!</h3>

    <?php foreach ($donations as $donate) : ?>
        <ul>
            <?php foreach ($donate as $item => $value) : ?>
                <li><?php echo $item; ?>: <?php echo $value; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>

</body>

</html>