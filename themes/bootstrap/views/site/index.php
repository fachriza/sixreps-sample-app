<?php $this->beginWidget('bootstrap.widgets.BootHero', array(
    'heading'=>'Welcome to ' . CHtml::encode(Yii::app()->name),
)); ?>

<p>&nbsp;</p>

<p>For more details on how to further develop application with <a href="http://developers.sixreps.com/">Sixreps API</a>, please read
the <a href="http://developers.sixreps.com/docs/">documentation</a>.

<p>
    <?php
        $this->widget('bootstrap.widgets.BootButton', array(
            'type'=>'primary',
            'size'=>'large',
            'label'=>'Learn more',
            'url' => 'http://developers.sixreps.com/docs/'
        ));
    ?>
</p>

<?php $this->endWidget(); ?>