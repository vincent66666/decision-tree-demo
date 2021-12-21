<?php

declare(strict_types=1);

namespace DecisionTree\Model\Logic;

class GenderLogic extends AbstractLogic
{
    public function getDecisionValue(array $data): string
    {
        return $data['gender'];
    }
}
