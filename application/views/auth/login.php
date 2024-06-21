<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if ($this->session->flashdata('error')): ?>
        <p><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>
    <?php echo form_open('auth/login'); ?>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php echo set_value('username'); ?>">
            <?php echo form_error('username'); ?>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password">
            <?php echo form_error('password'); ?>
        </div>
        <button type="submit">Login</button>
    <?php echo form_close(); ?>
</body>
</html>