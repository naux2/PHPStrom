<html>
<head>
    <title>php ci 表单验证类</title>
</head>
<body>

<?php echo stristr("8877yyt&hgtt","*");?>
<?php echo validation_errors(); ?>

<?php echo form_open('formcheck'); ?>

<h5>Username</h5>
<input type="text" name="username" value="<?php echo set_value('username'); ?>" size="50" />
<?php echo form_error('username', '<div class="error">', '</div>'); ?>
<h5>Password</h5>
<input type="password" name="password" value="" size="50" />

<h5>Password Confirm</h5>
<input type="password" name="passconf" value="" size="50" />

<h5>Email Address</h5>
<input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />

<h5>职业</h5>
<select name="myselect">
    <option value="one" <?php echo  set_select('myselect', 'one'); ?> >地图开拓者</option>
    <option value="two" <?php echo  set_select('myselect', 'two',TRUE); ?> >银河力量</option>
    <option value="three" <?php echo  set_select('myselect', 'three'); ?> >暗黑吞噬者</option>
</select>

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>