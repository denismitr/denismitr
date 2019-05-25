<?php

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Contact::class, 45)->state(Contact::STATUS_PENDING)->create();

        factory(Contact::class, 3)->state(Contact::STATUS_SENDING)->create();

        factory(Contact::class, 20)->state(Contact::STATUS_SENT)->create();

        factory(Contact::class, 35)->state(Contact::STATUS_PROCESSED)->create();

        factory(Contact::class, 20)->state(Contact::STATUS_ARCHIVED)->create();
    }
}
