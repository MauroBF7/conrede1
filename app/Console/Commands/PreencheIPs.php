<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\NIP;

class PreencheIPs extends Command
{
    protected $signature = 'nip:preencher {subrede}';
    protected $description = 'Preenche a tabela NIP com os IPs de uma sub-rede /24';

    public function handle()
    {
        $subrede = $this->argument('subrede'); // Exemplo: 143.107.35.

        for ($i = 1; $i <= 254; $i++) {
            $ip = "$subrede.$i";

            // Evita duplicatas
            if (!NIP::where('ip', $ip)->exists()) {
                NIP::create(['ip' => $ip]);
                $this->info("IP $ip criado.");
            } else {
                $this->info("IP $ip já existe, pulando.");
            }
        }

        $this->info('IPs preenchidos com sucesso!');
    }
}
