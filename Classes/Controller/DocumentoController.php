<?php
declare(ENCODING = 'utf-8') ;
namespace Fernando\Docs\Controller;

/*
* DocumentoController
*
*
*/
class DocumentoController extends \TYPO3\FLOW3\MVC\Controller\ActionController
{

    /**
     * @inject
     * @var Fernando\Docs\Domain\Repository\DocumentoRepository
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
        $newDoc = new \Fernando\Docs\Domain\Model\Documento();
    }

    /**
     * @param \Fernando\Docs\Domain\Model\Documento $newDoc
     * @return void
     */
    public function createAction(\Fernando\Docs\Domain\Model\Documento $newDoc)
    {
        $newDoc->setFecha(new \DateTime());
        $this->documentoRepository->add($newDoc);
        $this->redirect('index');
    }

    /**
     * @param \Fernando\Docs\Domain\Model\Documento $doc
     * @return void
     */
    public function editAction(\Fernando\Docs\Domain\Model\Documento $doc)
    {
        $this->view->assign('doc', $doc);
    }

    /**
     * @param \Fernando\Docs\Domain\Model\Documento $doc
     * @return void
     */
    public function updateAction(\Fernando\Docs\Domain\Model\Documento $doc)
    {
        $doc->setFecha(new \DateTime());
        $this->documentoRepository->update($doc);
        $this->flashMessageContainer->add('Tu documento ha sido actualizado.');
        $this->redirect('index');
    }

    /**
     * @param \Fernando\Docs\Domain\Model\Documento $doc
     * @return void
     */
    public function showAction(\Fernando\Docs\Domain\Model\Documento $doc)
    {
        $this->view->assign('doc', $doc);
    }

}