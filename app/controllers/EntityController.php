<?php

class EntityController extends Controller
{
    public function actionView($name)
    {
        /** @var Entity $model */
        $model = Entity::model()->findByAttributes(array(
            'name'=>$name,
        ));

        $values = array();

        if ($model instanceof Entity) {
            foreach ($model->values as $value) {
                $values[] = array(
                    'id' => $value->id,
                    'property' => $value->property->name,
                    'value' => $value->value,
                );
            }
        }

        $dataProvider = new CArrayDataProvider($values, array(
            'id'=>'values',
        ));

        $this->render('view', array(
            'model'=>$model,
            'dataProvider'=>$dataProvider,
        ));
    }

    public function actionCreate()
    {
        $model = new Entity();

        if (isset($_POST['Entity']))
		{
			$model->attributes = $_POST['Entity'];
			if ($model->validate())
				$this->redirect(array('update'));
        }

        $this->render('create', array(
           'model' => $model,
        ));
    }

	public function actionUpdate($id)
	{
		// todo: clean up this method.
		$model = $this->loadModel($id);

		$elements = array();
		$formModel = new EntityForm();
		$attributeNames = array();

		$elements['name'] = array('type'=>'textfield');

		foreach ($model->properties as $property)
		{
			$htmlOptions = isset($property->htmlOptions) ? $property->htmlOptions : array();
			$htmlOptions['hint'] = $property->description;

			$elements[$property->name] = array(
				'type'=>$property->input,
				'htmlOptions'=>$htmlOptions,
			);

			$attributeNames[] = $property->name;

			foreach ($property->buildRules() as $rule)
				$formModel->addRule($rule);
		}

		$formModel->setAttributeNames($attributeNames);

		if (isset($_POST['EntityForm']))
		{
			$model->attributes = $_POST['EntityForm'];
			$formModel->setAttributes($_POST['EntityForm']);
			if ($formModel->validate())
				$this->redirect(array('admin'));
		}

		$buttons = array(
			'submit'=>array(
				'buttonType'=>'submit',
				'type'=>'primary',
				'label'=>'Save',
			),
			'cancel'=>array(
				'buttonType'=>'link',
				'type'=>'link',
				'label'=>'Cancel',
				'url'=>Yii::app()->homeUrl,
			),
		);

		$config = array(
			'elements'=>$elements,
			'buttons'=>$buttons,
		);

		$attributes = array();

		foreach ($model->attributes as $name => $value)
			$attributes[$name] = $value;

		foreach ($model->values as $value)
			$attributes[$value->property->name] = $value->value;

		$formModel->setAttributes($attributes);

		$form = new TbForm($config, $formModel);

		$this->render('update', array(
			'model' => $model,
			'form' => $form,
		));
	}

	public function actionAdmin()
	{
		$model = new Entity('search');

		if (isset($_GET['Entity']))
			$model->attributes = $_GET['Entity'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @return Entity
	 */
	public function loadModel($id)
	{
		$model = Entity::model()->findbyPk($id);

		if ($model === null)
			throw new CHttpException(404, 'The requested page does not exist.');

		return $model;
	}
}
