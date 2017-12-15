<?php if(isset($popup)): ?>
	<?php if($popup->type == 1): ?>
	<?php echo $popup->content; ?>

	<?php else: ?>
	<style>
	.sm-modal-content {
	    background-color: #fefefe;
	    padding: 0;
	    border: 1px solid #888;
	    position: fixed;
	    bottom: 0;
	    right: 0;
	    width: auto;
	    height: auto;
	    max-width: 40%;
	    text-align: center;
	}
	.sm-close {
	    color: #aaaaaa;
	    font-size: 28px;
	    font-weight: bold;
	    position: absolute;
	    top: -10px;
	    right: 0;
	}
	.sm-close:hover,
	.sm-close:focus {
	    color: #000;
	    text-decoration: none;
	    cursor: pointer;
	}
	#sm-myModal .sm-modal-content{
		border-radius: 0;
		padding: 0 !important;
		/*width: auto;*/
	}
	</style>
	<div class="sm-modal-content" id="sm-modal">
	    <span class="sm-close">&times;</span>
	    <?php if($popup->type == 3): ?>
	    <embed src="<?php echo e(asset($popup->content)); ?>"></embed>
	    <?php elseif($popup->type == 2): ?>
	    <?php echo $popup->content; ?>

	    <?php endif; ?>
	</div>
	<script>
	var modal = document.getElementById('sm-modal');
	var span = document.getElementsByClassName("sm-close")[0];
	function openModal() {
		return new Promise(function(resolve, reject){
	    	modal.style.display = "block";
			resolve();
		});
	}
	span.onclick = function() {
		modal.style.display = "none";
	}
	openModal().then(function(){
		<?php if($popup->hidden_time): ?>
		setTimeout(function(){
			modal.style.display = "none";
		}, parseInt('<?php echo e($popup->hidden_time."000"); ?>'));
		<?php endif; ?>
	});
	</script>
	<?php endif; ?>
<?php endif; ?>