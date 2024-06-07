<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat Datang di Dashboard</h1>
    <p>Nama: <?php echo $this->session->userdata('nama'); ?></p>
    <p>Email: <?php echo $this->session->userdata('email'); ?></p>
    <a href="<?php echo site_url('auth/logout'); ?>">Logout</a>
</body>
</html>
