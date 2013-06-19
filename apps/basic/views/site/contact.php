<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Captcha;

/**
 * @var yii\base\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\models\ContactForm $model
 */
$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?php echo Html::encode($this->title); ?></h1>

<?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>
<div class="alert alert-success">
	Thank you for contacting us. We will respond to you as soon as possible.
</div>
<?php return; endif; ?>

<p>
	If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<?php $form = ActiveForm::begin(array(
	'model' => $model,
	'options' => array('class' => 'form-horizontal'),
	'fieldConfig' => array('inputOptions' => array('class' => 'input-xlarge')),
)); ?>
	<?php echo $form->field('name')->textInput(); ?>
	<?php echo $form->field('email')->textInput(); ?>
	<?php echo $form->field('subject')->textInput(); ?>
	<?php echo $form->field('body')->textArea(array('rows' => 6)); ?>
	<?php echo $form->field('verifyCode')->widget(Captcha::className(), array(
		'options' => array('class' => 'input-medium'),
	)); ?>
	<div class="form-actions">
		<?php echo Html::submitButton('Submit', null, null, array('class' => 'btn btn-primary')); ?>
	</div>
<?php ActiveForm::end(); ?>
