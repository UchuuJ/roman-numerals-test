<?php

namespace App\Console\Commands;

use App\Http\Helpers\ConvertLogicHelper;
use Illuminate\Console\Command;

class convertFrom extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roman-numerals:convert-from {param}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert Roman Numerals to Integers E.g (VII -> 7)';

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
        $numeral = $this->argument('param');
        $originalValue = $numeral;

        $convertLogic = new ConvertLogicHelper();
        try {
            $convertedValue = $convertLogic->convertToInteger($numeral);
            print PHP_EOL." Roman Numeral {$originalValue} converted to Number is: {$convertedValue}".PHP_EOL;

        } catch (\Exception $exception){
            //Because this is the console I feel safe displaying the error and trace to the user.
            error_log("Error: {$exception->getMessage()} Trace:{$exception->getTraceAsString()}");
            print "Error: {$exception->getMessage()} ".PHP_EOL." Trace:{$exception->getTraceAsString()}";
            exit;
        }

    }
}
