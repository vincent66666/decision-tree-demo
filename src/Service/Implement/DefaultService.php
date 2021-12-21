<?php

declare(strict_types=1);

namespace DecisionTree\Service\Implement;

use DecisionTree\Model\Tree\NodeDecision;

class DefaultService extends AbstractImplementService
{
    public function process(array $treeNodeDecisionList, $data): bool
    {
        /** @var NodeDecision $treeNodeDecision */
        foreach ($treeNodeDecisionList as $treeNodeDecision) {
            $logicDecision = $this->getLogicDecision($treeNodeDecision->getKey());
            //获取需要决策的值
            $decisionValue = $logicDecision->getDecisionValue($data);
            if ($logicDecision->filterDecisionNode($decisionValue, $treeNodeDecision)) {
                continue;
            }
            return false;
        }
        return true;
    }
}
