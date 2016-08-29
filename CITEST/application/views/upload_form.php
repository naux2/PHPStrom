<html>
<head>
    <title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('update/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

<ul>
    <?php foreach ($upload_data as $item => $value):?>
        <li><?php echo $item;?>: <?php echo $value;?></li>
    <?php endforeach; ?>
</ul>


</body>
</html>