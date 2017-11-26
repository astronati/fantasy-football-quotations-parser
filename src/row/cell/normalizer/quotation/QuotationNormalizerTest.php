<?php

use \FFQP\Row\Cell\QuotationNormalizer as QuotationNormalizer;

/**
 * @codeCoverageIgnore
 */
class QuotationNormalizerTest extends PHPUnit_Framework_TestCase
{
    
    public function dataProvider()
    {
        return array(
          array('10', 10),
          array(10, 10),
          array(0, 0),
          array('0', 0),
        );
    }
    
    /**
     * @dataProvider dataProvider
     * @param * $value
     * @param int $result
     */
    public function testNormalize($value, $result)
    {
        $quotation = new QuotationNormalizer();
        $this->assertInternalType('int', $quotation->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock()));
        $this->assertSame($result, $quotation->normalize($value, $this->getMockBuilder('\FFQP\Row\Data\RawData')->getMock()));
    }
}
