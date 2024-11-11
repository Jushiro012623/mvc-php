<h1> 
    <ul>
        <?php foreach($names as $u) : ?>
            <li><?= $u->name ?> (<?= $u->dateOfBirth ?>)</li>
        <?php endforeach ?>
    </ul>
</h1>