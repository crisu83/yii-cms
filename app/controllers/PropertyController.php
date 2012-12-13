<?php

class PropertyController extends Controller
{
	public function actionCreate()
	{
		$model = new Property();

		if (isset($_POST['Property']))
		{
			$model->attributes = $_POST['Property'];
			if ($model->validate())
				$this->redirect(array('admin'));
		}

		$this->render('create', array(
			'model' => $model,
		));
	}

	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		if (isset($_POST['Property']))
		{
			$model->attributes = $_POST['Property'];
			if ($model->validate())
				$this->redirect(array('admin'));
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	public function actionAdmin()
	{
		$model = new Property('search');

		if (isset($_GET['Property']))
			$model->attributes = $_GET['Property'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @return Property
	 */
	public function loadModel($id)
	{
		$model = Property::model()->findbyPk($id);

		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');

		return $model;
	}
}
