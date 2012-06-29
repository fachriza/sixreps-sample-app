<div class="layout-main">

	<?php $this->pageTitle=Yii::app()->name; ?>

	<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

	<p></p>
	<p>You can login with your <a href="http://www.sixreps.com/">Sixreps</a> account.</p>

	<p>You may change the content of this page by modifying the following two files:</p>
	<ul>
		<li>View file: <tt><?php echo __FILE__; ?></tt></li>
		<li>Layout file: <tt><?php echo $this->getLayoutFile('main'); ?></tt></li>
	</ul>

	<p>For more details on how to further develop application with Sixreps API, please read
	the <a href="http://developers.sixreps.com/docs/">documentation</a>.
	Feel free to create your stunning apps at <a href="http://developers.sixreps.com/">Sixreps Developers Site</a>.</p>

</div>