<h2>記事一覧</h2>

<ul>
<?php foreach ($posts as $post) : ?>
	<li><?php echo h($post['Post']['title']); ?>
	</li>
<?php endforeach; ?>
</ul>
