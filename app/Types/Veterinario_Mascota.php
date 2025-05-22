<?php

namespace App\Types;

use DateTime;

class Veterinario_Mascota
{
    private int $id;
    private int $idVeterinario;
    private int $idMascota;
    private DateTime $fechaAtencion;
    private ?string $motivoAtencion;

    public function __construct(int $id, int $idVeterinario, int $idMascota, $fechaAtencion, ?string $motivoAtencion = null)
    {
        $this->setId($id);
        $this->setidVeterinario($idVeterinario);
        $this->setIdMascota($idMascota);
        $this->setFechaAtencion($fechaAtencion);
        $this->setMotivoAtencion($motivoAtencion);
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

    public function getIdVeterinario(): int
    {
        return $this->idVeterinario;
    }

    public function setidVeterinario(int $idVeterinario): void
    {
        if ($idVeterinario > 0) {
            $this->idVeterinario = $idVeterinario;
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

    public function getFechaAtencion(): string
    {
        return $this->fechaAtencion->format('Y-m-d');
    }

    public function setFechaAtencion($fecha): void
    {
        if ($fecha instanceof DateTime) {
            $this->fechaAtencion = $fecha;
        } else {
            $this->fechaAtencion = new DateTime($fecha);
        }
    }  

    public function getMotivoAtencion(): ?string
    {
        return $this->motivoAtencion;
    }

    public function setMotivoAtencion(?string $motivoAtencion): void
    {
        $this->motivoAtencion = $motivoAtencion;
    }
}
