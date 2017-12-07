<?php

namespace FFQP\Map;

/**
 * Defines a Gazzetta xls of seasons 2013/2014 and 2014/2015
 */
class MapGazzettaSince2013 extends MapAbstract
{
    /**
     * @inheritdoc
     * @see MapAbstract::getColumnIndexByFieldNameMap()
     */
    protected function getColumnIndexByFieldNameMap(): array
    {
        return [
            self::CODE => 0,
            self::PLAYER => 1,
            self::TEAM => 2,
            self::ROLE => 3,
            self::SECONDARY_ROLE => 3,
            self::ACTIVE => 4,
            self::QUOTATION => 5,
            self::MAGIC_POINTS => 6,
            self::VOTE => 7,
            self::GOALS => 8,
            self::YELLOW_CARDS => 9,
            self::RED_CARDS => 10,
            self::PENALTIES => 11,
            self::AUTO_GOALS => 12,
            self::ASSISTS => 13,
        ];
    }
}
