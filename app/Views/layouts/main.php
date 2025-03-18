<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title ?? 'Expense Tracker') ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>
    <?= $this->renderSection('content') ?>
</body>
</html>
