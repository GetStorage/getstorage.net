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
        $index = array();
        $all = \CFS\Folder::all();

        \CFS\Index::clear();

        $path = '';
        
        // Loop through all of our folders and all of their files.
        foreach($all as $folder) {
            $path .= $folder->name;

            $files = $folder->files()->get();
            foreach($files as $file) {
                // Add files to index
                $index .= '/'.$file->name;
            }

        }

        dd($index);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array();
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array();
    }

}