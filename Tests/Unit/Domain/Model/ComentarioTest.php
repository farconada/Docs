<?php
namespace Fernando\Docs\Tests\Unit\Domain\Model;
/**
 * Created by JetBrains PhpStorm.
 * User: falcifer
 * Date: 22/08/11
 * Time: 18:13
 * To change this template use File | Settings | File Templates.
 */

class ComentarioTest extends \TYPO3\FLOW3\Tests\UnitTestCase {

    /**
     * @test
     * @return void
     */
    public function dateIsSet(){
        $comentario = new \Fernando\Docs\Domain\Model\Comentario();
        $this->assertInstanceOf('DateTime',$comentario->getFecha());
    }

}