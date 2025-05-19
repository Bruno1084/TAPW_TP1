<?php

namespace App\Types;

use DateTime;
use InvalidArgumentException;

class Veterinario
{
    private int $id;
    private string $nombre;
    private string $apellido;
    private string $especialidad;
    private string $telefono;
    private ?DateTime $fechaIngreso;
    private ?DateTime $fechaEgreso;

    public function __construct(
        int $id,
        string $nombre,
        string $apellido,
        string $especialidad,
        string $telefono,
        $fechaIngreso = null,
        $fechaEgreso = null
    ) {
        $this->setId($id);
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setEspecialidad($especialidad);
        $this->setTelefono($telefono);
        $this->setFechaIngreso($fechaIngreso);
        $this->setFechaEgreso($fechaEgreso);

        $this->checkVars();
    }

    private function checkVars(): void
    {
        if (empty($this->nombre)) {
            throw new InvalidArgumentException("Nombre inválido");
        }

        if (empty($this->apellido)) {
            throw new InvalidArgumentException("Apellido inválido");
        }

        if (empty($this->especialidad)) {
            throw new InvalidArgumentException("Especialidad inválida");
        }

        if (!preg_match('/^[0-9+\s()-]+$/', $this->telefono)) {
            throw new InvalidArgumentException("Teléfono inválido");
        }

        if ($this->fechaEgreso && $this->fechaEgreso < $this->fechaIngreso) {
            throw new InvalidArgumentException("Fecha de egreso no puede ser anterior a la de ingreso");
        }
    }

    // ID
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        if ($id < 0) {
            throw new InvalidArgumentException("ID inválido");
        }
        $this->id = $id;
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

    // Apellido
    public function getApellido(): string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): void
    {
        $this->apellido = trim($apellido);
    }

    // Especialidad
    public function getEspecialidad(): string
    {
        return $this->especialidad;
    }

    public function setEspecialidad(string $especialidad): void
    {
        $this->especialidad = trim($especialidad);
    }

    // Teléfono
    public function getTelefono(): string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): void
    {
        $this->telefono = trim($telefono);
    }

    // Fecha de ingreso
    public function getFechaIngreso(): string
    {
        return $this->fechaIngreso ? $this->fechaIngreso->format('Y-m-d') : null;
    }

    public function setFechaIngreso($fecha): void
    {
        if (is_null($fecha)) {
            $this->fechaIngreso = null;
        } else {
            $this->fechaIngreso = $fecha instanceof DateTime ? $fecha : new DateTime($fecha);
        }
    }

    // Fecha de egreso
    public function getFechaEgreso(): ?string
    {
        return $this->fechaEgreso ? $this->fechaEgreso->format('Y-m-d') : null;
    }

    public function setFechaEgreso($fecha): void
    {
        if (is_null($fecha)) {
            $this->fechaEgreso = null;
        } else {
            $this->fechaEgreso = $fecha instanceof DateTime ? $fecha : new DateTime($fecha);
        }
    }
}
