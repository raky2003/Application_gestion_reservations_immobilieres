<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Register;

class AdminRegister extends Register
{
    protected function mutateFormDataBeforeRegister(array $data): array
    {
        $data['role'] = 'admin';

        return $data;
    }
}
