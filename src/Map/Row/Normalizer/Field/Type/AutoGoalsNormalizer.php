<?php

namespace FFQP\Map\Row\Normalizer\Field\Type;

use FFQP\Map\Row\Normalizer\Field\NormalizedFieldsContainer;
use FFQP\Map\Row\Normalizer\Field\RowFieldNormalizerInterface;
use FFQP\Map\Row\Row;
use FFQP\Model\Quotation;
use FFQP\Parser\QuotationsParserFactory;

/**
 * Normalizes the "autoGoals" value
 */
class AutoGoalsNormalizer implements RowFieldNormalizerInterface
{
    const GOALKEEPER_MALUS = -1;
    const DEFAULT_MALUS = -2;

    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize($value, Row $row, string $format, NormalizedFieldsContainer $normalizedFieldsContainer = null): int
    {
        if ($format == QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_WORLD_CUP_2018) {
            return abs((int) $value);
        }

        $malus = $normalizedFieldsContainer->get(Quotation::AUTO_GOALS_MAGIC_POINTS);
        return (int) $malus / ($row->secondaryRole === Row::GOALKEEPER ? self::GOALKEEPER_MALUS : self::DEFAULT_MALUS);
    }
}
