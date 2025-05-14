<?php

namespace App\Types;

use DateTime;
use InvalidArgumentException;

class Mascota
{
    private int $nroRegistro;
    private string $nombre;
    private string $especie;
    private string $raza;
    private int $edad;
    private DateTime $fechaAlta;
    private ?DateTime $fechaDefuncion;

    public function __construct(
        int $nroRegistro,
        string $nombre,
        string $especie,
        string $raza,
        int $edad,
        $fechaAlta,
        $fechaDefuncion = null
    ) {
        $this->setNroRegistro($nroRegistro);
        $this->setNombre($nombre);
        $this->setEspecie($especie);
        $this->setRaza($raza);
        $this->setEdad($edad);
        $this->setFechaAlta($fechaAlta);
        $this->setFechaDefuncion($fechaDefuncion);

        $this->checkVars();
    }

    private function checkVars(): void
    {
        if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u', $this->nombre)) {
            throw new InvalidArgumentException("Nombre inválido");
        }

        if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/u', $this->especie)) {
            throw new InvalidArgumentException("Especie inválida");
        }

        if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s\-]+$/u', $this->raza)) {
            throw new InvalidArgumentException("Raza inválida");
        }

        if ($this->edad < 0 || $this->edad > 100) {
            throw new InvalidArgumentException("Edad inválida");
        }

        if ($this->fechaDefuncion && $this->fechaDefuncion < $this->fechaAlta) {
            throw new InvalidArgumentException("Fecha de defunción no puede ser anterior a la fecha de alta");
        }
    }

    // Nro de registro
    public function getNroRegistro(): int
    {
        return $this->nroRegistro;
    }

    public function setNroRegistro(int $nroRegistro): void
    {
        if ($nroRegistro <= 0) {
            throw new InvalidArgumentException("Número de registro inválido");
        }
        $this->nroRegistro = $nroRegistro;
    }

    // Nombre
    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = trim($nombre);
    }

    // Especie
    public function getEspecie(): string
    {
        return $this->especie;
    }

    public function setEspecie(string $especie): void
    {
        $this->especie = trim($especie);
    }

    // Raza
    public function getRaza(): string
    {
        return $this->raza;
    }

    public function setRaza(string $raza): void
    {
        $this->raza = trim($raza);
    }

    // Edad
    public function getEdad(): int
    {
        return $this->edad;
    }

    public function setEdad(int $edad): void
    {
        $this->edad = $edad;
    }

    // Fecha Alta
    public function getFechaAlta(): string
    {
        return $this->fechaAlta->format('Y-m-d');
    }

    public function setFechaAlta($fecha): void
    {
        $this->fechaAlta = $fecha instanceof DateTime ? $fecha : new DateTime($fecha);
    }

    // Fecha Defunción
    public function getFechaDefuncion(): ?string
    {
        return $this->fechaDefuncion ? $this->fechaDefuncion->format('Y-m-d') : null;
    }

    public function setFechaDefuncion($fecha): void
    {
        if (is_null($fecha)) {
            $this->fechaDefuncion = null;
        } else {
            $this->fechaDefuncion = $fecha instanceof DateTime ? $fecha : new DateTime($fecha);
        }
    }
}
