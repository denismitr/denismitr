<?php

namespace App\Console\Commands;

use App\Models\Business;
use Illuminate\Console\Command;

class CreateBusiness extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'business:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create business';

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
    {
        if (Business::first()) {
            $this->error("Already exists");
            return;
        }

        Business::create([
            'first_name_ru' => 'Денис',
            'last_name_ru' => 'Митрофанов',
            'first_name_en' => 'Denis',
            'last_name_en' => 'Mitrofanov',
            'email' => 'denis.mitr@gmail.com',
            'twitter' => '@denis_mitr'
        ]);

        $this->info("Done");
    }
}
