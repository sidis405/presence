<?php

namespace App\Console\Commands;

use App\Presence;
use App\Events\MovementWasMade;
use Illuminate\Console\Command;

class CloseAllPresences extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'presence:close-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Close all presences';

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
        $openPresences = Presence::whereNull('updated_at')->with('employee')->get();

        if (count($openPresences)) {
            $this->line('Closing ' . count($openPresences) . ' presences');

            foreach ($openPresences as $presence) {
                $presence->dirty_close = 1;
                $presence->save();

                $this->line('->' . $presence->employee->name);
            }

            event(new MovementWasMade());
        } else {
            $this->line('No presences need to be closed.');
        }
    }
}
