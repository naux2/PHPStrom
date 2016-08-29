<html>
<head>
    <title><?=$title."replace" ?></title>
</head>
<body>
<h1><?php echo $heading;?></h1>
<h3>循环添加内容-controller是个恶棍</h3>

<ul>
    <?php foreach ($todo_list as $sitem):?>

        <li><?php echo $sitem;?></li>

    <?php endforeach;?>
</ul>

<h2>执行时间:<?php echo $this->benchmark->elapsed_time();?></h2>

<h2>占用内存:<?php echo $this->benchmark->memory_usage();?></h2>

</body>
</html>