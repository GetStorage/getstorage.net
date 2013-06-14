<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class IndexCommand extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Regenerates the CFS Index.';

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
     * @return void
     */
    public function fire()
    {
        CFSIndex::clear();
        //$all = CFS::all();
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {

    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {

    }

}