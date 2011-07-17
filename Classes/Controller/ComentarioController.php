<?php
declare(ENCODING = 'utf-8') ;
namespace Fernando\Docs\Controller;

/*
* ComentarioController
*
*
*/
class ComentarioController extends \TYPO3\FLOW3\MVC\Controller\ActionController
{

    /**
     * @param \Fernando\Docs\Domain\Model\Documento $newDoc
     * @return void
     */
    public function newAction(\Fernando\Docs\Domain\Model\Documento $doc)
    {
        $this->view->assign('doc', $doc);
    }


    public function createAction(\Fernando\Docs\Domain\Model\Documento $doc, \Fernando\Docs\Domain\Model\Comentario $comentario)
    {
        $comentario->setFecha(new \DateTime());
        $doc->addComentario($comentario);
        $this->redirect('index', 'Documento');
    }
}