<?php

namespace App\Filament\Resources\TenantResource\Pages;

use App\Filament\Resources\TenantResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTenant extends CreateRecord
{
    protected static string $resource = TenantResource::class;

    public function afterCreate(): void
    {
        $tenant = $this->getRecord();

        if (!empty($this->data['domain'])) {
            $tenant->domains()->create([
                'domain' => $this->data['domain'],
            ]);
        }

    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }


}
