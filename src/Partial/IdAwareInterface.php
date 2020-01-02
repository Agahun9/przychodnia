<?php


namespace App\Partial;


interface IdAwareInterface
{

    /**
     * @param int $id
     */
    public function setId(int $id): void;


    public function getId(): ?int;

}