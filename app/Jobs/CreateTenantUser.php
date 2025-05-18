<?php

namespace App\Jobs;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Role;


class CreateTenantUser implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Tenant $tenant)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->tenant->run(function () {
            // Cria a role super_admin se não existir
            Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);


            // Gera permissões baseadas nos Resources, Pages e Widgets
            Artisan::call('shield:generate --panel=admin --all');


            $this->tenant->run(function () {
                // 1. Criar usuário
                $user = User::create([
                    'name' => $this->tenant->name,
                    'email' => $this->tenant->email,
                    'password' => $this->tenant->password,
                ]);

                // cria o super usuario
                Artisan::call('shield:super-admin --user=1');
                // Atribui role
                //$user->assignRole('super_admin');
            });
        });
    }

}
