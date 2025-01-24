<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DropAllTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:drop-all-tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop all tables from the database after a specific time.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Starting to drop all tables...');

        $tables = DB::select('SELECT name FROM sqlite_master WHERE type="table" AND name NOT LIKE "sqlite_%"');
        $tables = array_map(fn($table) => $table->name, $tables);

        if (empty($tables)) {
            $this->info('No tables found in the database.');
            return 0;
        }

        foreach ($tables as $table) {
            DB::statement("DROP TABLE IF EXISTS {$table}");
            $this->info("Dropped table: {$table}");
        }

        $this->info('All tables have been successfully dropped.');
        return 0;
    }
}
