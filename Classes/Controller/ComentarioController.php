<?php
declare(ENCODING = 'utf-8') ;
namespace F3\Docs\Controller;

/*
* ComentarioController
*
*
*/
class ComentarioController extends \F3\FLOW3\MVC\Controller\ActionController
{

    /**
     * @param \F3\Docs\Domain\Model\Documento $newDoc
     * @return void
     */
    public function newAction(\F3\Docs\Domain\Model\Documento $doc)
    {
        $this->view->assign('doc', $doc);
    }


    public function createAction(\F3\Docs\Domain\Model\Documento $doc, \F3\Docs\Domain\Model\Comentario $comentario)
    {
        $comentario->setFecha(new \DateTime());
        $doc->addComentario($comentario);
        $this->redirect('index', 'Documento');
    }
}