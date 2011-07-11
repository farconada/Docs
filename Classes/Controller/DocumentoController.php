<?php
declare(ENCODING = 'utf-8') ;
namespace F3\Docs\Controller;

/*
* DocumentoController
*
*
*/
class DocumentoController extends \F3\FLOW3\MVC\Controller\ActionController
{

    /**
     * @inject
     * @var F3\Docs\Domain\Repository\DocumentoRepository
     */
    protected $documentoRepository;

    /**
     * indexAction
     * @return void
     */
    public function indexAction()
    {
        $docs = $this->documentoRepository->findAll();
        $this->view->assign('docs', $docs);
    }


    public function newAction()
    {
        $newDoc = new \F3\Docs\Domain\Model\Documento();
    }

    /**
     * @param \F3\Docs\Domain\Model\Documento $newDoc
     * @return void
     */
    public function createAction(\F3\Docs\Domain\Model\Documento $newDoc)
    {
        $newDoc->setFecha(new \DateTime());
        $this->documentoRepository->add($newDoc);
        $this->redirect('index');
    }

    /**
     * @param \F3\Docs\Domain\Model\Documento $doc
     * @return void
     */
    public function editAction(\F3\Docs\Domain\Model\Documento $doc)
    {
        $this->view->assign('doc', $doc);
    }

    /**
     * @param \F3\Docs\Domain\Model\Documento $doc
     * @return void
     */
    public function updateAction(\F3\Docs\Domain\Model\Documento $doc)
    {
        $doc->setFecha(new \DateTime());
        $this->documentoRepository->update($doc);
        $this->flashMessageContainer->add('Tu documento ha sido actualizado.');
        $this->redirect('index');
    }

    /**
     * @param \F3\Docs\Domain\Model\Documento $doc
     * @return void
     */
    public function showAction(\F3\Docs\Domain\Model\Documento $doc)
    {
        $this->view->assign('doc', $doc);
    }

}