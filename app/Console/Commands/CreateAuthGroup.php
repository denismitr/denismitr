<?php

namespace App\Console\Commands;

use Denismitr\Permissions\Exceptions\AuthGroupAlreadyExists;
use Denismitr\Permissions\Models\AuthGroup;
use Illuminate\Console\Command;

class CreateAuthGroup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auth-group:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create auth group';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {;
        try {
            $authGroup = AuthGroup::create(['name' => $this->argument('name')]);
            $this->info("Auth group `{$authGroup->name}` created.");
        } catch (AuthGroupAlreadyExists $e) {
            $this->error("Auth group with name {$this->argument('name')} already exists.");
            return;
        }

    }
}
