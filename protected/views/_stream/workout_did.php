<li class="<?php echo (isset($spanClass)) ? $spanClass : 'span8'; ?>">
    <a href="<?php echo $this->createUrl('/user/profile/', array('id' => $list->subject->id)); ?>" class="thumbnail profile-photo">
        <img src="<?php echo $list->subject->avatar->url; ?>" />
    </a>
    <div class="caption">
        <h5>
            <a href="<?php echo $this->createUrl('/user/profile/', array('id' => $list->subject->id)); ?>"><?php echo $list->subject->displayname; ?></a> has did some workout
        </h5>
        <p>
            I did
            <a href="<?php echo $this->createUrl('/workout/view/', array('id' => $list->object->id)); ?>"><?php echo $list->attachment->content->workout->name; ?></a>
            exercise at <?php echo date('F j, Y - H:i', strtotime($list->created_at)); ?>.                
        </p>

        <p>
            <?php if ($list->comment_count > 0): ?>
                <a class="comment-links" href="<?php echo Yii::app()->createUrl('/comments/view/', array('id' => $list->id)); ?>">Comments</a> <span class="badge <?php echo ($list->comment_count > 0) ? 'badge-inverse' : ''; ?>"><?php echo number_format($list->comment_count); ?></span> | 
            <?php else: ?>
                Comments <span class="badge <?php echo ($list->comment_count > 0) ? 'badge-inverse' : ''; ?>"><?php echo number_format($list->comment_count); ?></span> | 
            <?php endif; ?>
            Likes <span class="badge <?php echo ($list->like_count > 0) ? 'badge-inverse' : ''; ?>"><?php echo number_format($list->like_count); ?></span>
        </p>
        <?php if ($list->comment_count > 0): ?>
            <?php $comments = Comments::streamComment($list->id); ?>
            <ul class="nav nav-tabs nav-stacked comment-stream">

                <?php foreach($comments->entries as $com): ?>
                    <li>
                        <img src="<?php echo $com->from->avatar->url; ?>" />
                        <div class="content">
                            <h5>
                                <a href="<?php echo $this->createUrl('/user/profile/', array('id' => $com->from->id))?>"><?php echo $com->from->displayname; ?></a>
                            </h5>
                            <p>
                                <?php echo $com->body; ?>
                            </p>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>  
    </div>
</li>