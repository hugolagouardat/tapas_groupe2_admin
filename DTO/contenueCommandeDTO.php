<?php
class contenueCommandeDTO 
{

    private $commandeId;
    private $tapasId;
    private $nombre;

    function __construct($commandeId, $tapasId,$nombre) {
		$this->commandeId = $commandeId;
		$this->tapasId = $tapasId;
        $this->nombre = $nombre;
	}
    /**
     * Get the value of commandeId
     */
    public function getCommandeId()
    {
        return $this->commandeId;
    }

    /**
     * Set the value of commandeId
     *
     * @return  self
     */
    public function setCommandeId($commandeId)
    {
        $this->commandeId = $commandeId;

        return $this;
    }

    /**
     * Get the value of tapasId
     */
    public function getTapasId()
    {
        return $this->tapasId;
    }

    /**
     * Set the value of tapasId
     *
     * @return  self
     */
    public function setTapasId($tapasId)
    {
        $this->tapasId = $tapasId;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }
    
}
