<?php

namespace Hyn\Webserver\Commands;

use App;
use Hyn\Framework\Commands\AbstractCommand;
use Hyn\Webserver\Helpers\LetsEncryptHelper;

class LetsEncryptCommand extends AbstractCommand
{

    /**
     * @var Certificate
     */
    protected $certificate;

    /**
     * @var string
     */
    protected $action;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'letsencrypt';

    /**
     * Create a new command instance.
     *
     * @param        $hostname_id
     */
    public function __construct($hostname_id)
    {
        parent::__construct();

        $this->hostname = app('Hyn\MultiTenant\Contracts\HostnameRepositoryContract')->findById($hostname_id);
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    public function handle()
    {
        (new LetsEncryptHelper($this->hostname))->generate();
    }
}
