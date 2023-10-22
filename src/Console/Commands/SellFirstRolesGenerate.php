<?php

namespace SellFirstPHP\SellFirstRoles\Console\Commands;

use Illuminate\Console\Command;
use SellFirstPHP\SellFirstRoles\Services\GenerateRoles;

class SellFirstRolesGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'sell-first:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'sell-first roles generate new roles for users or create new admin user';


    /**
     * @return void
     */
    public function handle(): void
    {
        //Get Table Name
        $tableName = $this->ask('🍅 Please input your table name you went to create roles for it? (ex: users)');

        //Generate Roles Service
        try {
            $resourceGenerator = new GenerateRoles(tableName:$tableName);
            $resourceGenerator->generate();
            $this->info('🍅 Roles Has Been Generated Success');
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return;
        }
    }
}
