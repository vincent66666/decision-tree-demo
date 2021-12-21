<?php

declare(strict_types=1);

namespace DecisionTree\Interfaces;

interface ImplementInterface
{
    public function process(array $treeNodeDecisionList, $data): bool;

    public function getLogicDecision(?string $decisionKey = null): LogicDecisionInterface;
}
