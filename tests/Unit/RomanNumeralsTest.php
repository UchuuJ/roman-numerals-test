<?php
namespace Tests\Unit;

use App\Http\Helpers\ConvertLogicHelper;
use Tests\TestCase;


class RomanNumeralsTest extends TestCase
{
    /** @test **/
    public function ToIntegers(){
      $logic =  new ConvertLogicHelper();

      $this->assertEquals(1,$logic->convertToInteger('I'));
        $this->assertEquals(2,$logic->convertToInteger('II'));
        $this->assertEquals(3,$logic->convertToInteger('III'));
        $this->assertEquals(4,$logic->convertToInteger('IV'));
        $this->assertEquals(6,$logic->convertToInteger('VI'));
        $this->assertEquals(7,$logic->convertToInteger('VII'));
        $this->assertEquals(8,$logic->convertToInteger('VIII'));
        $this->assertEquals(9,$logic->convertToInteger('IX'));
        $this->assertEquals(10,$logic->convertToInteger('X'));
        $this->assertEquals(20,$logic->convertToInteger('XX'));
        $this->assertEquals(30,$logic->convertToInteger('XXX'));
        $this->assertEquals(40,$logic->convertToInteger('XL'));
        $this->assertEquals(50,$logic->convertToInteger('L'));
        $this->assertEquals(99999,$logic->convertToInteger('XCIXCMXCIX'));
                                                                                                $this->assertEquals(5,$logic->convertToInteger('V'));
    }

    /** @test **/
    public function ToRomanNumerals(){
        $logic =  new ConvertLogicHelper();

        $this->assertEquals('I',$logic->convertToRomanNumerals(1));
        $this->assertEquals('II',$logic->convertToRomanNumerals(2));
        $this->assertEquals('III',$logic->convertToRomanNumerals(3));
        $this->assertEquals('IV',$logic->convertToRomanNumerals(4));
        $this->assertEquals('VI',$logic->convertToRomanNumerals(6));
        $this->assertEquals('VII',$logic->convertToRomanNumerals(7));
        $this->assertEquals('VIII',$logic->convertToRomanNumerals(8));
        $this->assertEquals('IX',$logic->convertToRomanNumerals(9));
        $this->assertEquals('X',$logic->convertToRomanNumerals(10));
        $this->assertEquals('XX',$logic->convertToRomanNumerals(20));
        $this->assertEquals('XXX',$logic->convertToRomanNumerals(30));
        $this->assertEquals('XL',$logic->convertToRomanNumerals(40));
        $this->assertEquals('L',$logic->convertToRomanNumerals(50));
        $this->assertEquals('XCIXCMXCIX',$logic->convertToRomanNumerals(99999));
    }

}

?>
