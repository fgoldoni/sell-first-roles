<?php

namespace SellFirstPHP\SellFirstRoles\Console\Commands;

use Illuminate\Console\Command;
use TomatoPHP\ConsoleHelpers\Traits\HandleFiles;
use TomatoPHP\ConsoleHelpers\Traits\RunCommand;

class SellFirstRolesInstall extends Command
{
    use RunCommand;
    use HandleFiles;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'sell-first-roles:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'install sell-first roles packages and publish the assets';

    public function __construct()
    {
        parent::__construct();
        $this->publish = __DIR__ . "/../../../publish";
    }

    /**
     * @return void
     */
    public function handle(): void
    {
        $this->info('🍅 Publish Roles Vendor Assets');
        $this->handelFile('/config/permission.php', config_path('/permission.php'));
        $this->callSilent('config:cache');
        $this->callSilent('optimize:clear');
        $this->callSilent('migrate');
        $this->yarnCommand(['build']);
        $this->info('🍅 SellFirst Roles installed successfully.');
    }
}
