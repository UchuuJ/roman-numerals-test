<?php

namespace App\Http\Helpers;



use Exception;
class ConvertLogicHelper {
    private $_validNumerals = ['I','V','X','L','C','D','M'];

    /**
     * Two dictionarys one for the simple ones that deal with
     * 1 and 5.
     * and one to deal with the more complicated 9 and 4's
     * this is because if we just use 1 and 5 it breaks
     */
    private $_valueTwoLetterDictionary = [
        'IV' => 4,
        'IX' => 9,
        'XL' => 40,
        'XC' => 90,
        'CD' => 400,
        'CM' => 900,
    ];
    private $_valueDictionary = [
        'I' => 1,
        'V' => 5,
        'X' => 10,
        'L' => 50,
        'C' => 100,
        'D' => 500,
        'M' => 1000
    ];

    /**
     * This dictionary deals with converting numbers to Numerals
     */
    private $_valueToNumeralDictonary = [
      1 => 'I',
      4 => 'IV',
      5 => 'V',
      9 => 'IX',
      10 => 'X',
      40 => 'XL',
      50 => 'L',
      90 => 'XC',
      100 => 'C',
      400 => 'CD',
      500 => 'D',
      900 => 'CM',
      1000 => 'M'
    ];


    public function convertToRomanNumerals(string $number) : string {

        /**
         * Check if the number is an integer or a decimal
         * and if the number is bigger then 999
         */

        if(!is_numeric($number)){
            Throw new Exception("Please enter a number between 1 - 99999", 400);
        }

        if($number >= 100000 || $number < 1){
            Throw new Exception("Please enter a number between 1 - 99999", 400);
        }

        $currentDivisable = 0;
        $catanatedNumerals = '';
        $realNumber = $number;

        //This code deals with Dash numerals
        if($number > 1000){
            //anything lower then 999 is the lower half of the string;
            $number  = (int)($number / 1000);

            while($number != 0){
                foreach ($this->_valueToNumeralDictonary as $index => $value){
                    if( $number >= $index){
                        $currentDivisable = $index;
                    }
                }

                $letterCount = $number / $currentDivisable;

                $number = $number % $currentDivisable;
                for($i=0; $i<(int)$letterCount;$i++){
                    $catanatedNumerals = $catanatedNumerals . $this->_valueToNumeralDictonary[$currentDivisable];
                }
            }

            //Set the rest to be divisible
            $number = $realNumber % 1000;
            $currentDivisable = 0;
        }


        /**
         * Loop through value array to find the biggest number we can divide by
         * we then divide number by the number we found and then add that Letter to the
         * Roman Numeral String.
         * We repeat the process till the number is zero
         */
        while($number != 0){
            foreach ($this->_valueToNumeralDictonary as $index => $value){
                if( $number >= $index){
                    $currentDivisable = $index;
                }
            }

            $letterCount = $number / $currentDivisable;

            $number = $number % $currentDivisable;
            for($i=0; $i<(int)$letterCount;$i++){
                $catanatedNumerals = $catanatedNumerals . $this->_valueToNumeralDictonary[$currentDivisable];
            }
        }

        return $catanatedNumerals;
    }

    public function convertToInteger(string $numerals) : Int {

        if(!$this->validateNumerals($numerals)){
            Throw new Exception("Invalid Roman Numerals", 400);
        }

        /**
         * Turns out there are actually 3 passes
         * first pass which check to see if the number is over 999 which is six
         * Roman numeral characters These are notated slightly different
         * with a dash over them but for the sake of simplicity we'll ignore that
         * The next pass will check for 4 and 9's
         * The last pass will check for 1 and 5's
         */
        $value = 0;

        /**
         * This if checks to see if the passed string is over 6 characters
         * we substring the characters over 6
         * and then perform pass one and pass two. With the value multiplied by 1000
         * since these are "dash numerals"
         */

        if(strlen($numerals) > 6){
            $dashNumerals = substr($numerals,0,strlen($numerals) - 6);
            for($i = strlen($dashNumerals) - 1; $i >= 0;$i-- ){
                $numeral = substr($dashNumerals, $i, 2);
                if(in_array($numeral, array_keys($this->_valueTwoLetterDictionary))) {
                    $tempValue = $this->_valueTwoLetterDictionary[$numeral] * 1000;
                    $value = $value + $tempValue;
                    $strBeg = substr($dashNumerals,0, $i);
                    $strEnd = substr($dashNumerals,$i + 2);
                    $dashNumerals = $strBeg ."  ". $strEnd;
                }
            }

            for($i=strlen($dashNumerals)-1; $i>=0;$i--){
                $numeral = substr($dashNumerals, $i, 1);
                if(in_array($numeral, array_keys($this->_valueDictionary))) {
                    $tempValue = $this->_valueDictionary[$numeral] * 1000;
                    $value = $value + $tempValue;
                }

            }

            //Calculate Padding because it will be verying length
            $padding = "";
            for($i=0;$i<strlen($numerals) - 6; $i++){
                $padding = $padding." ";
            }

           $numerals = substr($numerals, strlen($numerals) - 6,strlen($numerals));
           $numerals = $padding . $numerals;

        }

        // First pass
        for($i=strlen($numerals)-1; $i>=0;$i--){
            $numeral = substr($numerals, $i, 2);
            if(in_array($numeral, array_keys($this->_valueTwoLetterDictionary))) {
                $tempValue = $this->_valueTwoLetterDictionary[$numeral];
                $value = $value + $tempValue;
                $strBeg = substr($numerals,0,$i);
                $strEnd = substr($numerals,$i+2);
                $numerals = $strBeg ."  ". $strEnd;
            }
        }

         for($i=strlen($numerals)-1; $i>=0;$i--){
             $numeral = substr($numerals, $i, 1);
              if(in_array($numeral, array_keys($this->_valueDictionary))) {
                  $tempValue = $this->_valueDictionary[$numeral];
                  $value = $value + $tempValue;
              }

         }

        return $value;

    }

    private function validateNumerals(string &$numerals): bool{

        //Check that we have a string of Letters
        if(is_numeric($numerals)){
           Throw new Exception("Invalid Roman Numerals", 400);
        }
        $numerals = strtoupper($numerals);


        //Check that we have valid Roman Numeral characters
        for($i = 0; $i<strlen($numerals);$i++) {
            if (!in_array(substr($numerals,$i, 1), $this->_validNumerals)) {
                Throw new Exception("Invalid Roman Numerals", 400);
            }
        }
        return true;
    }


}

?>
