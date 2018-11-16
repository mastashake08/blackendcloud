<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AddAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:add {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new admin to the system';

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
        //
        $user = \App\User::where('email',$this->argument('email'))->first();
        $user->is_admin = true;
        $user->save();
        $this->info('Admin added!');
    }
}
