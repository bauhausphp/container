<?php

namespace Bauhaus;

use Bauhaus\StringContainer;

class StringContainerWithCustomMessageOfItemCanNotBeContainedException extends StringContainer
{
    protected function itemCanNotBeContainedExceptionMessage(string $label): string
    {
        return "Custom exception message: $label";
    }
}
