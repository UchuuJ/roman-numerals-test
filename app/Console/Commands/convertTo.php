<?php

namespace App\Console\Commands;

use App\Http\Helpers\ConvertLogicHelper;
use Illuminate\Console\Command;

class convertTo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roman-numerals:convert-to {param}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Convert Integers to Roman Numerals  E.g (7 -> VII)';

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
        $number = $this->argument('param');
        $originalValue = $number;

        try {
            $convertLogic = new ConvertLogicHelper();
            $convertedValue = $convertLogic->convertToRomanNumerals($number);
            print PHP_EOL . "{$originalValue} converted to Roman Numeral is: {$convertedValue}" . PHP_EOL;
        } catch (\Exception $exception){

            error_log("Error: {$exception->getMessage()} Trace:{$exception->getTraceAsString()}");
            print "Error: {$exception->getMessage()} ".PHP_EOL;
            exit;
        }
    }
}
