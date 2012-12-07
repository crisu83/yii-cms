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
            foreach ($model->propertyValues as $value) {
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

    public function actionCreate($typeId)
    {
        $model = new Entity();

        $model->entityTypeId = $typeId;

        if (isset($_POST['EntityForm'])) {
           // Save the entity here...
        }

        $this->render('create', array(
           'model' => $model,
        ));
    }
}
