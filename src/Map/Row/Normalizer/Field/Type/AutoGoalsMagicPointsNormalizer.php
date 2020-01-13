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
class AutoGoalsMagicPointsNormalizer implements RowFieldNormalizerInterface
{
    /**
     * @inheritdoc
     * @see RowFieldNormalizerInterface::normalize()
     */
    public function normalize(
      $value,
      Row $row,
      string $format,
      NormalizedFieldsContainer $normalizedFieldsContainer
    ): float
    {
        if (in_array($format, [
            QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2013,
            QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2015,
            QuotationsParserFactory::FORMAT_GAZZETTA_SINCE_2017,
        ])) {
            return (float) $value;
        }

        $autoGoals = $normalizedFieldsContainer->get(Quotation::AUTO_GOALS)->normalize($value, $row, $format, $normalizedFieldsContainer);
        return $autoGoals * ($row->role === Row::GOALKEEPER ? AutoGoalsNormalizer::GOALKEEPER_MALUS : AutoGoalsNormalizer::DEFAULT_MALUS);
    }
}
