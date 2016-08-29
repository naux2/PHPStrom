<html>
<head>
    <title>Upload Form</title>
</head>
<body>

<h3>Your file was successfully uploaded!</h3>

<ul>
    <?php foreach ($upload_data as $item => $value):?>
        <li><?php echo $item;?>: <?php echo $value;?></li>
    <?php endforeach; ?>
</ul>

<p><?php echo anchor('http://localhost:7175/CITEST/index.php/update/index', 'Upload Another File!'); ?></p>

</body>
</html>