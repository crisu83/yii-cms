<?php

class Less extends CApplicationComponent
{
	protected $_assetsUrl;

	/**
	 * Registers the LESS JavaScript compiler.
	 */
	public function registerJsCompiler()
	{
		Yii::app()->clientScript->registerScriptFile($this->getAssetsUrl().'/less.min.js');
	}

	/**
	 * Returns the URL to the published assets folder.
	 * @return string the URL
	 */
	protected function getAssetsUrl()
	{
		if (isset($this->_assetsUrl))
			return $this->_assetsUrl;
		else
		{
			$assetsUrl = Yii::app()->assetManager->publish(__DIR__.'/../assets', false, -1, YII_DEBUG);
			return $this->_assetsUrl = $assetsUrl;
		}
	}

	/**
	 * Returns the extension version number.
	 * @return string the version
	 */
	public function getVersion()
	{
		return '1.0.0';
	}
}
