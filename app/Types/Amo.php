<?php

namespace App\Types;

use DateTime;
use InvalidArgumentException;

class Amo
{
    private int $id;
    private string $nombre;
    private string $apellido;
    private string $direccion;
    private string $telefono;
    private DateTime $fechaAlta;

    public function __construct($id, $nombre, $apellido, $direccion, $telefono, $fechaAlta)
    {
        $this->setId($id);
        $this->setNombre($nombre);
        $this->setApellido($apellido);
        $this->setDireccion($direccion);
        $this->setTelefono($telefono);

        if ($fechaAlta instanceof DateTime) {
            $this->fechaAlta = $fechaAlta;
        } else {
            $this->fechaAlta = new DateTime($fechaAlta);
        }

        $this->checkVars();
    }

    private function checkVars(): void
    {
        if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/u', $this->nombre)) {
            throw new InvalidArgumentException("Nombre inválido");
        }

        if (!preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]+$/u', $this->apellido)) {
            throw new InvalidArgumentException("Apellido inválido");
        }

        if (!preg_match('/^[0-9]{6,15}$/', $this->telefono)) {
            throw new InvalidArgumentException("Teléfono inválido");
        }

        if (empty($this->direccion)) {
            throw new InvalidArgumentException("Dirección no puede estar vacía");
        }

        if (!$this->fechaAlta instanceof DateTime) {
            throw new InvalidArgumentException("Fecha inválida");
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

    // Dirección
    public function getDireccion(): string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): void
    {
        $this->direccion = trim($direccion);
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

    // FechaAlta
    public function getFechaAlta(): string
    {
        return $this->fechaAlta->format('Y-m-d');
    }

    public function setFechaAlta($fecha): void
    {
        if ($fecha instanceof DateTime) {
            $this->fechaAlta = $fecha;
        } else {
            $this->fechaAlta = new DateTime($fecha);
        }
    }
}
