<?php

declare(strict_types=1);

namespace DecisionTree\Service\Implement;


use DecisionTree\Interfaces\ImplementInterface;
use DecisionTree\Interfaces\LogicDecisionInterface;
use Exception;

abstract class AbstractImplementService implements ImplementInterface
{
    protected array $logicDecisionMap;


    protected string $decisionKey = 'default';

    protected array $logicDecisions;

    public function __construct(array $logic)
    {
        $this->logicDecisionMap = $logic;
    }

    public function getLogicDecision(?string $decisionKey = null): LogicDecisionInterface
    {
        $decisionKey = $decisionKey ?? $this->defaultDecisionKey();
        if (empty($this->logicDecisionMap[$decisionKey])) {
            throw new Exception("Does not support this LogicDecision driver", 500);    
        }
        return $this->logicDecisions[$decisionKey] ?? 
        $this->logicDecisions[$decisionKey] = new $this->logicDecisionMap[$decisionKey]($decisionKey);
    }

    protected function defaultDecisionKey(): string
    {
        return $this->decisionKey;
    }
}
