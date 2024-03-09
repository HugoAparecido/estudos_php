<title><?= $title ?></title>
<ul>
    <?php foreach ($users as $item) { ?>
    <li><?= $item['email'] ?></li>
    <li><?= $item['senha'] ?></li>
    <?php } ?>
</ul>