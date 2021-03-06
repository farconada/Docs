<?php
declare(ENCODING = 'utf-8');
namespace Fernando\Docs\Domain\Model;
/**
 * Documentos
 *
 * 
 */
 
/**
 * @scope prototype
 * @entity
 */
class Documento {
 
    /**
     * @identity
     * @var integer
     * @Id
     * @GeneratedValue
     */
    protected $id;

    /**
     * titulo
     *
     * @var string
     * @validate Text, StringLength(minimum = 1, maximum = 120)
     * @Column(length="80")
     */
    protected $titulo = '';

    /**
     * @var \TYPO3\FLOW3\Resource\Resource
     * @ManyToOne(cascade={"all"})
     * validate NotEmpty
     */
    protected $fichero;

    /**
     * fecha
     * @var \DateTime
     * @dontvalidate
     * @Column(type="datetime")
     */
    protected $fecha;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection<\Fernando\Docs\Domain\Model\Comentario>
     * @OneToMany(mappedBy="documento", cascade={"all"}, orphanRemoval="true")
     */
    protected $comentarios;
    
 
    /**
     * @param int $id
     */
    public function setId($id) {
        $this->id = $id;
    }
 
    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param string $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param \TYPO3\FLOW3\Resource\Resource $fichero
     */
    public function setFichero(\TYPO3\FLOW3\Resource\Resource $fichero)
    {
        $this->fichero = $fichero;
    }

    /**
     * @return \TYPO3\FLOW3\Resource\Resource
     */
    public function getFichero()
    {
        return $this->fichero;
    }

    /**
     * @param \DateTime $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    public function __construct() {
        $this->fecha = new \DateTime();
    }

    /**
     * Adds a comment to this post
     *
     * @param \Fernando\Docs\Domain\Model\comentario $comentario
     * @return void
     */
    public function addComentario(\Fernando\Docs\Domain\Model\Comentario $comentario) {
            $comentario->setDocumento($this);
            $this->comentarios->add($comentario);
    }

    /**
     * Removes a comment from this post
     *
     * @param \Fernando\Docs\Domain\Model\Comentario $comentario
     * @return void
     */
    public function removeComentario(\Fernando\Docs\Domain\Model\Comentario $comentario) {
            $this->comentarios->removeElement($comentario);
    }

    /**
     * Returns the comments to this post
     *
     * @return \Doctrine\Common\Collections\ArrayCollection<\Fernando\Docs\Domain\Model\Comentario>
     */
    public function getComentarios() {
            return $this->comentarios;
    }

    public function getUltimoComentario() {
            return $this->comentarios[count($this->comentarios )-1];
    }

}