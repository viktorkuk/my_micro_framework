<?php require('header.php'); ?>

<h1>Entries in my blog</h1>

<?php foreach ($news as $row): ?>

    <div class="entry">
        <h3>
            <a target="_blank" href="/news/entry/<?=$row['id']?>"><?=$row['title']?></a>
        </h3>
        <p class="content"><?=$row['text']?></p>
        <span class="date"><?=$row['date']?></span>
    </div>


<?php endforeach ?>


<?php require('footer.php') ?>