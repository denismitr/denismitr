<?php

namespace App\Console\Commands;

use App\Models\Business;
use App\Models\User;
use Denismitr\Permissions\Models\AuthGroup;
use Illuminate\Console\Command;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin';

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
     * @throws \Denismitr\Permissions\Exceptions\AuthGroupAlreadyExists
     * @throws \Denismitr\Permissions\Exceptions\AuthGroupDoesNotExist
     */
    public function handle()
    {
        $password = $this->option('password');

        if (!AuthGroup::existsWithName('admins')) {
            AuthGroup::create(['name' => 'admins']);
        }

        $admin = User::create([
            'name' => 'Denis Mitrofanov',
            'email' => 'denis.mitr@gmail.com',
            'password' => bcrypt(trim($password)),
        ]);

        AuthGroup::named('admins')->addUser($admin);

        $this->info("\nDone");
    }
}
