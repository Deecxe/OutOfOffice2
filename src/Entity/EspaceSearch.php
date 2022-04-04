<?php

namespace App\Entity;


class EspaceSearch {
    /**
     * @var float|null
     */
    private $maxPrice;
    /**
     * @var string|null
     */
    private $horaire;

    /**
     * @return float|null
     */
    public function getMaxPrice(): ?float
    {
        return $this->maxPrice;
    }
    /**
     * @param float|null $maxPrice
     * @return EspaceSearch
     */
    public function setMaxPrice(?float $maxPrice): EspaceSearch
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getHoraire(): ?string
    {
        return $this->horaire;
    }

    /**
     * @param string|null $horaire
     * @return EspaceSearch
     */

    public function setHoraire(?string $horaire): EspaceSearch
    {
        $this->horaire = $horaire;
        return $this;
    }   

}