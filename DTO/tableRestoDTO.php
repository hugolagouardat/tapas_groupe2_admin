<?php
class tableRestoDTO 
{

    private $idTable;
    private $etat;

    function __construct($idTable, $etat)
    {
        $this->idTable = $idTable;
        $this->etat = $etat;
    }
    /**
     * Get the value of idTable
     */
    public function getIdTable()
    {
        return $this->idTable;
    }

    /**
     * Set the value of idTable
     *
     * @return  self
     */
    public function setIdTable($idTable)
    {
        $this->idTable = $idTable;

        return $this;
    }

    /**
     * Get the value of etat
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     *
     * @return  self
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }
    
}
