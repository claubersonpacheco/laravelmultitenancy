<?php
// app/Services/ShieldPermissionGenerator.php
namespace App\Services;

use BezhanSalleh\FilamentShield\Support\Utils;

class ShieldPermissionGenerator
{
    public function generate(): void
    {
        // Esse método é o mesmo que o shield:generate faz internamente
        Utils::
        Utils::generateForPages();
        Utils::generateForWidgets();
    }
}
