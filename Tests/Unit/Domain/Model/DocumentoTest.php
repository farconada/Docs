<?php
namespace Fernando\Docs\Tests\Unit\Domain\Model;
/**
 * Created by JetBrains PhpStorm.
 * User: falcifer
 * Date: 22/08/11
 * Time: 18:13
 * To change this template use File | Settings | File Templates.
 */

class DocumentoTest extends \TYPO3\FLOW3\Tests\UnitTestCase {

    /**
     * @test
     * @return void
     */
    public function dateIsSet(){
        $documento = new \Fernando\Docs\Domain\Model\Documento();
        $this->assertInstanceOf('DateTime',$documento->getFecha());
    }

    /**
     * @test
     * @return void
     */
    public function canAttachResource() {

    }

}