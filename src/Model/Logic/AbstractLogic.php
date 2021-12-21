<?php

declare(strict_types=1);

namespace DecisionTree\Model\Logic;

use DecisionTree\Interfaces\LogicDecisionInterface;
use DecisionTree\Model\Tree\NodeDecision;

abstract class AbstractLogic implements LogicDecisionInterface
{
    

    protected string $key;

    public function __construct(string $key)
    {
        
        $this->key  = $key;
    }

    /**
     * 过滤出节点决策.
     *
     * @param string $decisionValue
     * @param NodeDecision $treeNodeDecision
     *
     * @return bool
     */
    public function filterDecisionNode(
        string $decisionValue,
        NodeDecision $treeNodeDecision
    ): bool {
        return $this->filterDecisionByType($decisionValue, $treeNodeDecision);
    }

    /**
     * @param string $decisionValue 决策值
     * @param NodeDecision $treeNodeDecision 节点决策
     *
     * @return bool
     */
    public function filterDecisionByType(
        string $decisionValue,
        NodeDecision $treeNodeDecision
    ): bool {
        switch ($treeNodeDecision->getType()) {
            case 'eq':
                $decision = $decisionValue == $treeNodeDecision->getValue();
                break;
            case 'gt':
                $decision = $decisionValue > $treeNodeDecision->getValue();
                break;
            case 'gte':
                $decision = $decisionValue >= $treeNodeDecision->getValue();
                break;
            case 'lt':
                $decision = $decisionValue < $treeNodeDecision->getValue();
                break;
            case 'lte':
                $decision = $decisionValue <= $treeNodeDecision->getValue();
                break;
            case 'between':
                $decision = $decisionValue >= $treeNodeDecision->getValue()[0]
                    && $decisionValue <= $treeNodeDecision->getValue()[1];
                break;
            default:
                $decision = false;
                break;
        }
        return $decision;
    }
}
