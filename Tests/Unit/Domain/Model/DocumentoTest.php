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
    public function returnsOnlyTheLastComment() {
        $comentario1 = new \Fernando\Docs\Domain\Model\Comentario();
        $comentario1->setTexto('AAA');
        $comentario2 = new \Fernando\Docs\Domain\Model\Comentario();
        $comentario2->setTexto('BBB');
        $documento = new \Fernando\Docs\Domain\Model\Documento();
        $documento->addComentario($comentario1);
        $documento->addComentario($comentario2);
        $ultimoComentario = $documento->getUltimoComentario();
        $this->assertEquals('BBB',$ultimoComentario->getTexto());
    }

}