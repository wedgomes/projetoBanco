<?php

namespace App\Entity;

use App\Repository\TransacaoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransacaoRepository::class)]
class Transacao
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $valor = null;

    #[ORM\ManyToOne(inversedBy: 'transacaos')]
    private ?Conta $contaDestino = null;

    #[ORM\ManyToOne(inversedBy: 'transacaos')]
    private ?Conta $contaOrigem = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValor(): ?float
    {
        return $this->valor;
    }

    public function setValor(float $valor): self
    {
        $this->valor = $valor;

        return $this;
    }

    public function getContaDestino(): ?Conta
    {
        return $this->contaDestino;
    }

    public function setContaDestino(?Conta $contaDestino): self
    {
        $this->contaDestino = $contaDestino;

        return $this;
    }

    public function getContaOrigem(): ?Conta
    {
        return $this->contaOrigem;
    }

    public function setContaOrigem(?Conta $contaOrigem): self
    {
        $this->contaOrigem = $contaOrigem;

        return $this;
    }
}
