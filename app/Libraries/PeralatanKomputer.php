<?php

namespace App\Libraries;

use App\Libraries\Peralatan;
use Override;

class PeralatanKomputer extends Peralatan
{
    #[Override]
    public function ringkasan(): string
    {
        return "[Komputer] " . parent::ringkasan();
    }
}