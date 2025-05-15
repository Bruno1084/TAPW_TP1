<?php

namespace App\Types;

use DateTime;

class Amo_Mascota
{
    private int $id;
    private int $idAmo;
    private int $idMascota;
    private DateTime $fechaIngreso;
    private ?DateTime $fechaFinal;
    private ?string $motivoFin;

    public function __construct(int $id, int $idAmo, int $idMascota, $fechaIngreso, $fechaFinal = null, ?string $motivoFin = null)
    {
        $this->setId($id);
        $this->setIdAmo($idAmo);
        $this->setIdMascota($idMascota);
        $this->setFechaIngreso($fechaIngreso);
        $this->setFechaFinal($fechaFinal);
        $this->setMotivoFin($motivoFin);
    }

    // Getters y setters
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        if ($id >= 0) {
            $this->id = $id;
        }
    }

    public function getIdAmo(): int
    {
        return $this->idAmo;
    }

    public function setIdAmo(int $idAmo): void
    {
        if ($idAmo > 0) {
            $this->idAmo = $idAmo;
        }
    }

    public function getIdMascota(): int
    {
        return $this->idMascota;
    }

    public function setIdMascota(int $idMascota): void
    {
        if ($idMascota > 0) {
            $this->idMascota = $idMascota;
        }
    }

    public function getFechaIngreso(): string
    {
        return $this->fechaIngreso->format('Y-m-d');
    }

    public function setFechaIngreso($fecha): void
    {
        if ($fecha instanceof DateTime) {
            $this->fechaIngreso = $fecha;
        } else {
            $this->fechaIngreso = new DateTime($fecha);
        }
    }

    public function getFechaFinal(): ?string
    {
        return $this->fechaFinal?->format('Y-m-d');
    }

    public function setFechaFinal($fechaFinal): void
    {
        if (is_null($fechaFinal)) {
            $this->fechaFinal = null;
        } elseif ($fechaFinal instanceof DateTime) {
            $this->fechaFinal = $fechaFinal;
        } else {
            $this->fechaFinal = new DateTime($fechaFinal);
        }
    }

    public function getMotivoFin(): ?string
    {
        return $this->motivoFin;
    }

    public function setMotivoFin(?string $motivoFin): void
    {
        $this->motivoFin = $motivoFin;
    }
}
