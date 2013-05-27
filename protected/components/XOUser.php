<?php

class XOUser extends CWebUser
{
	public function getModel() {
		$userId = Yii::app()->user->id;
		$user = User::model()->findByPk($userId);
		return $user;
	}
}
