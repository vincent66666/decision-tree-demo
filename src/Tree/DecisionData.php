<?php

declare(strict_types=1);

namespace DecisionTree\Tree;

use DecisionTree\Model\Tree\NodeDecision;

class DecisionData
{
    public function age_0_12(): NodeDecision
    {
        return new NodeDecision(1, '0-12', 'age', 'between', [0, 12]);
    }

    public function age_13_18(): NodeDecision
    {
        return new NodeDecision(2, '13-18', 'age', 'between', [13, 18]);
    }

    public function age_19_33(): NodeDecision
    {
        return new NodeDecision(3, '19-33', 'age', 'between', [19, 33]);
    }

    public function age_34_99(): NodeDecision
    {
        return new NodeDecision(4, '34-99', 'age', 'between', [34, 99]);
    }

    public function gender_man(): NodeDecision
    {
        return new NodeDecision(5, '性别男', 'gender', 'eq', 'man');
    }

    public function gender_woman(): NodeDecision
    {
        return new NodeDecision(6, '性别女', 'gender', 'eq', 'woman');
    }
}
