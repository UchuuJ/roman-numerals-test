<?php
namespace Tests\Unit;

use App\Http\Helpers\ConvertLogicHelper;
use Tests\TestCase;


class TestRomanNumerals extends TestCase
{
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

    public function ToRomanNumerals(){
        $logic =  new ConvertLogicHelper();

        $this->assertEquals('I',$logic->convertToRomanNumerals(1));
        $this->assertEquals('II',$logic->convertToInteger(2));
        $this->assertEquals('III',$logic->convertToInteger(3));
        $this->assertEquals('IV',$logic->convertToInteger(4));
        $this->assertEquals('VI',$logic->convertToInteger(6));
        $this->assertEquals('VII',$logic->convertToInteger(7));
        $this->assertEquals('VIII',$logic->convertToInteger(8));
        $this->assertEquals('IX',$logic->convertToInteger(9));
        $this->assertEquals('X',$logic->convertToInteger(10));
        $this->assertEquals('XX',$logic->convertToInteger(20));
        $this->assertEquals('XXX',$logic->convertToInteger(30));
        $this->assertEquals('XL',$logic->convertToInteger(40));
        $this->assertEquals('L',$logic->convertToInteger(50));
        $this->assertEquals('XCIXCMXCIX',$logic->convertToInteger(99999));
    }

}

?>
