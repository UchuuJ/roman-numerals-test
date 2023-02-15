<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ConvertLogicHelper;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * This will handle our API route
 * We will use a Helper class to do all our logic
 * This is so we can also use that class for the commandline
 */

class ConvertAjaxController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        /**
         * Picturing the Json to look like
         * {
         *  mode:0[integer] - 0 for to roman numerals 1 for to arabic numbers
         *  valueToConvert: LX [string] - Value we're converting.
         * }
         *
         * On success we return HTTP 200
         * {
         *   success: true [boolean], - if we're successful or not
         *   value: 50  [string] - value thats converted
         * }
         *
         * on error we return http 400 and log to error log
         * {
         *   success: false [boolean], - if we're successful or not
         *   message: 'Invalid value'
         * }
         */

        try {

            $data = file_get_contents('php://input');
            $data = json_decode($data);
            if(!$data){
                throw new \Exception('Invalid Data', 500);
            }

            $convertLogic = new ConvertLogicHelper();
            $result = '';
            if($data->mode == 0){
               $result = $convertLogic->convertToRomanNumerals($data->valueToConvert);

            } else if($data->mode == 1) {
                $result = $convertLogic->convertToInteger($data->valueToConvert);

            } else {
                throw new \Exception('Unrecognised Mode', 400);
            }

        } catch (\Exception $exception){
            error_log("Error: {$exception->getMessage()} Trace:{$exception->getTraceAsString()}");
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ],
                $exception->getCode()
            );
        }


        return response()->json([
            'success' => true,
            'value' => $result,
        ]);

    }
}
