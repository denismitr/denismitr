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
            'about_en' => trim($this->getAboutEn()),
            'about_ru' => trim($this->getAboutRu()),
            'email' => 'denis.mitr@gmail.com',
            'twitter' => '@denis_mitr'
        ]);

        $this->info("Done");
    }

    private function getAboutEn()
    {
        return "
            <p class=\"mb-2 text-xl\">
                I'm a Software Engineer from Moscow. I learned programming years ago, when I was a kid.
                And for the last 5 years I work as a full-stack web developer.
                I'm rather agnostic when it comes to programming languages, frameworks and tools, however I've got my own favorites
                and those are PHP 7, Python 3, GO and Elixir. I love working with modern frameworks like Laravel, Django and Phoenix.
            </p>
            <p class=\"mb-2 text-xl\">
                Currently I'm working at <a class=\"text-red hover:text-red-dark\" target=\"_blank\" href=\"https://tixel.com/au\">Tixel.com</a>.
            </p>
        ";
    }

    private function getAboutRu()
    {
        return "
            I'm a Software Engineer from Moscow. 
            I learned programming years ago, when I was a kid. And for the last 5 years I work as a full-stack web developer. 
            I'm rather agnostic when it comes to programming languages, frameworks and tools, however I've got my own favorites and those are PHP 7, Python 3, GO and Elixir. 
            I love working with modern frameworks like Laravel, Django and Phoenix. 
        ";
    }
}
