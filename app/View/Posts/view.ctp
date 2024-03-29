<h2><?php echo h($post['Post']['title']); ?></h2>

<p><?php echo h($post['Post']['title']); ?></p>

<h2>Comments</h2>

<ul>
	<?php foreach ($post['Comment'] as $comment): ?>
	<li id="comment_<?php echo h($comment['id']); ?>"><?php
	echo h($comment['body']) ?> by <?php echo h($comment['commenter']);
	echo $this->Html->link('削除', '#', array('class' => 'delete', 'data-comment-id' => $comment['id']));
	?></li>
	<?php endforeach; ?>
</ul>

<h2>Add comment</h2>

<?php
echo $this->Form->create('Comment', array('action' => 'add'));
echo $this->Form->input('commenter');
echo $this->Form->input('body', array('rows' => 3));
echo $this->Form->input('Comment.post_id', array('type' => 'hidden', 'value' => $post['Post']['id']));
echo $this->Form->end('Save Comment');
?>

<script>
$(function() {
	$('a.delete').click(function(e) {
		if (confirm('本当に良いですか?')) {
			$.post('/dotinstall/study-cakephp/comments/delete/'+$(this).data('comment-id'), {}, function(res) {
				$('#comment_'+res.id).fadeOut();
			}, "json");
		}
		return false;
	});
});
</script>
