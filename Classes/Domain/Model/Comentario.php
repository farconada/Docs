<?php
declare(ENCODING = 'utf-8');
namespace F3\Docs\Domain\Model;
/**
 * Comentario
 *
 * 
 */
 
/**
 * @scope prototype
 * @entity
 */
class Comentario {
 
    /**
     * @identity
     * @var integer
     * @Id
     * @GeneratedValue
     */
    protected $id;

    /**
     * texto
     *
     * @var string
     * @validate Text, NotEmpty
	 * @Column(type="text")
     */
    protected $texto = '';

    /**
     * @var \F3\Docs\Domain\Model\Documento
     * @ManyToOne(inversedBy="comentarios")
     */
    protected $documento;

    /**
     * fecha
     * @var \DateTime
     * @dontvalidate
     * @Column(type="datetime")
     */
    protected $fecha;
 
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
     * @param string $texto
     */
    public function setTexto($texto)
    {
        $this->texto = $texto;
    }

    /**
     * @return string
     */
    public function getTexto()
    {
        return $this->texto;
    }

    /**
     * @param \F3\Docs\Domain\Model\Documento $documento
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;
    }

    /**
     * @return \F3\Docs\Domain\Model\Documento
     */
    public function getDocumento()
    {
        return $this->documento;
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

}