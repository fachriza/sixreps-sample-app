<div class="row">
	<div class="span4">
		<ul class="nav nav-pills nav-stacked">
			<li class="<?php echo ($this->uniqueid == 'site' && $this->action->Id == 'index') ? 'active' : ''; ?>"><a href="<?php echo $this->createUrl('/site/index'); ?>">Updates</a></li>
			<li class="<?php echo ($this->uniqueid == 'site' && $this->action->Id == 'bodystats') ? 'active' : ''; ?>"><a href="<?php echo $this->createUrl('/site/bodystats'); ?>">Body Statistics</a></li>
			<li class="<?php echo ($this->uniqueid == 'site' && $this->action->Id == 'bodyprogress') ? 'active' : ''; ?>"><a href="<?php echo $this->createUrl('/site/bodyprogress'); ?>">Body Progress</a></li>
			<li class="<?php echo ($this->uniqueid == 'site' && $this->action->Id == 'workout') ? 'active' : ''; ?>"><a href="<?php echo $this->createUrl('/site/workout'); ?>">Workouts</a></li>
		</ul>
	</div>
	<div class="span8">
		<?php echo $this->renderPartial('_update-status', array()); ?>

		<ul class="streams">
			<?php if (!empty($stream->entries)): ?>
				<?php foreach ($stream->entries as $list): ?>
					<?php if ($list->type == 'status'): ?>
						<?php echo $this->renderPartial('//_stream/status', array('list'=>$list)); ?>
					<?php elseif ($list->type == 'post'): ?>
						<?php echo $this->renderPartial('//_stream/post', array('list'=>$list)); ?>
					<?php elseif ($list->type == 'workout_did'): ?>
						<?php echo $this->renderPartial('//_stream/workout_did', array('list'=>$list)); ?>
					<?php elseif ($list->type == 'bodystatistic'): ?>
						<?php echo $this->renderPartial('//_stream/bodystatistic', array('list'=>$list)); ?>
					<?php elseif ($list->type == 'bodyprogress_beforeafter'): ?>
						<?php echo $this->renderPartial('//_stream/bodyprogress_beforeafter', array('list'=>$list)); ?>
					<?php else: ?>
						<?php continue; ?>
					<?php endif; ?>
					<?php $last_id = $list->id; ?>
				<?php endforeach; ?>
			<?php endif; ?>
		</ul>

		<?php if($stream->has_prev): ?>
			<div class="load-more-stream">
				<a href="<?php echo $this->createUrl('/site/' . $this->action->Id, array('before_id' => $last_id)); ?>">Load more stream</a>
			</div>
		<?php endif; ?>
	</div>
</div>