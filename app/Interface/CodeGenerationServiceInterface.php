<?php

namespace App\Interface;

interface CodeGenerationServiceInterface
{
    public function generate(string $objectName): string;
}
