<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aotd
 * Date: 29.04.13
 * Time: 17:57
 * To change this template use File | Settings | File Templates.
 */

class XoController extends Controller {

    public $operands = 208;

    public function actionCalc()
    {
        $this->render('form');
    }

    public function actionResult()
    {
        if ( isset($_POST['op']) && count($_POST['op'])>=2 ) {
            $result = $_POST['op'][0] + $_POST['op'][1];
            $this->render('result', array(
                'result'=>$result
            ));
        } else {
            throw new CHttpException('404', 'Не переданы необходимые параметры!');
        }
    }
}