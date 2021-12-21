<?php

declare(strict_types=1);


namespace DecisionTree\Model\Logic;

class AgeLogic extends AbstractLogic
{
    public function getDecisionValue(array $data): string
    {
        return $data['age'];
    }
}
