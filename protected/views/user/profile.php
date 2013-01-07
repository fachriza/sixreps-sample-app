<div class="row">
	<div class="span3">
		<ul class="thumbnails">
			<li class="span3">
               <div class="thumbnail">
					<img src="<?php echo $profile->avatars->profile; ?>" alt="<?php echo $profile->displayname; ?>">
					<div class="caption"><h5><?php echo $profile->displayname; ?></h5>
						<p><?php echo $profile->status; ?></p>
						<p>Follower : <span class="badge <?php echo ($profile->followers_count) ? 'badge-success' : ''; ?>"><?php echo ($profile->followers_count) ? $profile->followers_count : 'No'; ?> <?php echo ($profile->followers_count > 1) ? 'Members' : 'Member';?></span></p>
						<p>Following : <span class="badge <?php echo ($profile->following_count) ? 'badge-success' : ''; ?>"><?php echo ($profile->following_count) ? $profile->following_count : 'No'; ?> <?php echo ($profile->following_count > 1) ? 'Members' : 'Member';?></span></p>
					</div>
				</div>
			</li>
		</ul>
	</div>
	<div class="span9">
		<h2><?php echo $profile->displayname; ?> Activities</h2>
		<hr></hr>
		<ul class="streams">
			<?php if (!empty($stream->entries)): ?>
				<?php foreach ($stream->entries as $list): ?>
					<?php if ($list->type == 'status'): ?>
						<?php echo $this->renderPartial('//_stream/status', array('list'=>$list, 'spanClass' => 'span9')); ?>
					<?php elseif ($list->type == 'post'): ?>
						<?php echo $this->renderPartial('//_stream/post', array('list'=>$list, 'spanClass' => 'span9')); ?>
					<?php elseif ($list->type == 'workout_did'): ?>
						<?php echo $this->renderPartial('//_stream/workout_did', array('list'=>$list, 'spanClass' => 'span9')); ?>
					<?php elseif ($list->type == 'bodystatistic'): ?>
						<?php echo $this->renderPartial('//_stream/bodystatistic', array('list'=>$list, 'spanClass' => 'span9')); ?>
					<?php elseif ($list->type == 'bodyprogress_photo'): ?>
						<?php echo $this->renderPartial('//_stream/bodyprogress_photo', array('list'=>$list, 'spanClass' => 'span9')); ?>
					<?php else: ?>
						<?php die(var_dump($list->type)); ?>
					<?php endif; ?>
					<?php $last_id = $list->id; ?>
				<?php endforeach; ?>
			<?php else: ?>
				<li></li>
			<?php endif; ?>
		</ul>

		<?php if($stream->has_prev): ?>
			<div class="load-more-stream">
				<a href="<?php echo $this->createUrl('/user/' . $this->action->Id . '/' . $profile->id . '?before_id=' . $last_id); ?>">Load more stream</a>
			</div>
		<?php endif; ?>
	</div>
</div>