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
    protected $signature = 'admin:create';

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
        $password = $this->ask('Enter password');

        if (!AuthGroup::existsWithName('admins')) {
            AuthGroup::create(['name' => 'admins']);
        }

        $admin = User::create([
            'name' => 'Denis Mitrofanov',
            'email' => 'denis.mitr@gmail.com',
            'password' => bcrypt(trim($password)),
        ]);

        AuthGroup::named('admins')->addUser($admin);

        Business::create([
            'first_name_ru' => 'Denis',
            'last_name_ru' => 'Mitrofanov',
            'first_name_en' => 'Denis',
            'last_name_en' => 'Mitrofanov',
            'email' => 'denis.mitr@gmail.com',
            'twitter' => 'https://twitter.com/@denis_mitr',
        ]);

        $this->info("\nDone");
    }
}
