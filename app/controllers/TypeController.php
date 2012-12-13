<?php

class TypeController extends Controller
{
    public function actionCreate()
    {
        $model = new Type();

        if (isset($_POST['Type']))
		{
			$model->attributes = $_POST['Type'];
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

		if (isset($_POST['Type']))
		{
			$model->attributes = $_POST['Type'];
			if ($model->validate())
				$this->redirect(array('admin'));
		}

		$this->render('update', array(
			'model' => $model,
		));
	}

	public function actionAdmin()
	{
		$model = new Type('search');

		if (isset($_GET['Type']))
			$model->attributes = $_GET['Type'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @return Type
	 */
	public function loadModel($id)
	{
		$model = Type::model()->findbyPk($id);

		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');

		return $model;
	}
}
