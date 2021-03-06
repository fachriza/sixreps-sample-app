<li class="<?php echo (isset($spanClass)) ? $spanClass : 'span8'; ?>">
    <?php $bodyprogress = Bodyprogress::streamBodyprogressAlbum($list->object->id); ?>
    <a href="<?php echo $this->createUrl('/user/profile/', array('id' => $list->subject->id)); ?>" class="thumbnail profile-photo">
        <img src="<?php echo $list->subject->avatar->url; ?>" />
    </a>
    <div class="caption">
        <h5><a href="<?php echo $this->createUrl('/user/profile/', array('id' => $list->subject->id))?>"><?php echo $list->subject->displayname; ?></a> has updated new body progress picture</h5>
        <div class="beforeafter_body">
            <?php
                foreach($bodyprogress->entries as $progresspic) {
                    if ($progresspic->state == 1) {
                        $beforepic = $progresspic;
                    } else if ($progresspic->state == 2) {
                        $afterpic = $progresspic;
                    }
                }
            ?>
            <?php if (isset($beforepic) && !empty($beforepic)): ?>
                <?php $before_photo_url = (!empty($beforepic->photos->profile->url)? $beforepic->photos->profile->url:$beforepic->photos->original->url);?>
                <?php $before_photo_name = (!empty($beforepic->photos->profile->name)? $beforepic->photos->profile->name:$beforepic->photos->original->name);?>
                <a class="thumbnail" href="<?php echo $before_photo_url; ?>">
                    <img src="<?php echo $before_photo_url; ?>" title="<?php echo $before_photo_name; ?>" alt="<?php echo $before_photo_name; ?>" />
                </a>
            <?php endif; ?>
            <i class="icon-chevron-right"></i>
            <?php if (isset($afterpic) && !empty($afterpic)): ?>
                <?php $after_photo_url = (!empty($afterpic->photos->profile->url)? $afterpic->photos->profile->url:$afterpic->photos->original->url);?>
                <?php $after_photo_name = (!empty($afterpic->photos->profile->name)? $afterpic->photos->profile->name:$afterpic->photos->original->name);?>
                <a class="thumbnail" href="<?php echo $after_photo_url; ?>">
                    <img src="<?php echo $after_photo_url; ?>" title="<?php echo $after_photo_name; ?>" alt="<?php echo $after_photo_name; ?>" />
                </a>
            <?php endif; ?>
            <div class="clear"></div>
        </div>

        <p>
            <?php if ($list->comment_count > 0): ?>
                <a  class="comment-links" href="<?php echo Yii::app()->createUrl('/comments/view/', array('id' => $list->id)); ?>">Comments</a> <span class="badge <?php echo ($list->comment_count > 0) ? 'badge-inverse' : ''; ?>"><?php echo number_format($list->comment_count); ?></span> | 
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