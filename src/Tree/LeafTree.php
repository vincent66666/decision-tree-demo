<?php

declare(strict_types=1);

namespace DecisionTree\Tree;

use DecisionTree\Tree\DecisionData;
use DecisionTree\Model\Tree\NextNode;
use DecisionTree\Model\Tree\Node;

class LeafTree
{
    /**
     * @var DecisionData|mixed
     */
    private $decisionObj;

    public function __construct()
    {
        $this->decisionObj = new DecisionData();
    }

    public function get(?Node $parentTreeNode = null): Node
    {
        //根节点
        $rootNode = new Node(1, 'branch', '根节点');
        if ($parentTreeNode) {
            $rootNode->setParentId($parentTreeNode->getId());
        }

        $rootChildOne = new Node(11, 'branch', '男', '男');
        $rootChildOne->setParentId($rootNode->getId());
        $rootChildOne->setNodeDecisionMap($this->decisionObj->gender_man());
        $rootNode->setChildMap($rootChildOne);
        // 根节点绑定指向决策1
        $rootNextNode1 =new NextNode($rootNode->getId(), $rootChildOne->getId());
        $rootNextNode1->setNodeDecisionMap($this->decisionObj->gender_man());
        $rootNode->setNextNodeMap($rootNextNode1);

        $rootChildOne1 = new Node(111, 'leaf', '男-0-12', '二次元');
        $rootChildOne1->setParentId($rootChildOne->getId());
        $rootChildOne1->setNodeDecisionMap($this->decisionObj->age_0_12());
        $rootChildOne->setChildMap($rootChildOne1);
        // 子节点1绑定指向决策
        $rootChildNextNode1 = new NextNode($rootChildOne->getId(), $rootChildOne1->getId());
        $rootChildNextNode1->setNodeDecisionMap($this->decisionObj->age_0_12());
        $rootChildOne->setNextNodeMap($rootChildNextNode1);

        $rootChildOne2 = new Node(112, 'leaf', '男-13-18', '学习文具');
        $rootChildOne2->setParentId($rootChildOne->getId());
        $rootChildOne2->setNodeDecisionMap($this->decisionObj->age_13_18());
        $rootChildOne->setChildMap($rootChildOne2);
        // 子节点1绑定指向决策
        $rootChildNextNode2 = new NextNode($rootChildOne->getId(), $rootChildOne2->getId());
        $rootChildNextNode2->setNodeDecisionMap($this->decisionObj->age_13_18());
        $rootChildOne->setNextNodeMap($rootChildNextNode2);

        $rootChildOne3 = new Node(113, 'leaf', '男-19-33', '金融杂志');
        $rootChildOne3->setParentId($rootChildOne->getId());
        $rootChildOne3->setNodeDecisionMap($this->decisionObj->age_19_33());
        $rootChildOne->setChildMap($rootChildOne3);
        // 子节点1绑定指向决策
        $rootChildNextNode3 = new NextNode($rootChildOne->getId(), $rootChildOne3->getId());
        $rootChildNextNode3->setNodeDecisionMap($this->decisionObj->age_19_33());
        $rootChildOne->setNextNodeMap($rootChildNextNode3);

        $rootChildOne4 = new Node(114, 'leaf', '男-34-99', '秃头救星');
        $rootChildOne4->setParentId($rootChildOne->getId());
        $rootChildOne4->setNodeDecisionMap($this->decisionObj->age_34_99());
        $rootChildOne->setChildMap($rootChildOne4);
        // 子节点1绑定指向决策
        $rootChildNextNode4 = new NextNode($rootChildOne->getId(), $rootChildOne4->getId());
        $rootChildNextNode4->setNodeDecisionMap($this->decisionObj->age_34_99());
        $rootChildOne->setNextNodeMap($rootChildNextNode4);

        $rootChildTwo = new Node(12, 'branch', '女', '女');
        $rootChildTwo->setParentId($rootNode->getId());
        $rootChildTwo->setNodeDecisionMap($this->decisionObj->gender_woman());
        $rootNode->setChildMap($rootChildTwo);
        // 根节点绑定指向决策2
       $rootNextNode2 =new NextNode($rootNode->getId(), $rootChildTwo->getId());
       $rootNextNode2->setNodeDecisionMap($this->decisionObj->gender_woman());
       $rootNode->setNextNodeMap($rootNextNode2);

        $rootChildTwo1 = new Node(121, 'branch', '女-0-12', '芭比娃娃');
        $rootChildTwo1->setParentId($rootChildTwo->getId());
        $rootChildTwo1->setNodeDecisionMap($this->decisionObj->age_0_12());
        $rootChildTwo->setChildMap($rootChildTwo1);
        // 子节点2绑定指向决策
        $rootChildNextNode21 = new NextNode($rootChildTwo->getId(), $rootChildTwo1->getId());
        $rootChildNextNode21->setNodeDecisionMap($this->decisionObj->age_0_12());
        $rootChildTwo->setNextNodeMap($rootChildNextNode1);

        $rootChildTwo2 = new Node(122, 'branch', '女-13-18', '学习用品');
        $rootChildTwo2->setParentId($rootChildTwo->getId());
        $rootChildTwo2->setNodeDecisionMap($this->decisionObj->age_13_18());
        $rootChildTwo->setChildMap($rootChildTwo2);
        // 子节点2绑定指向决策
        $rootChildNextNode22 = new NextNode($rootChildTwo->getId(), $rootChildTwo2->getId());
        $rootChildNextNode22->setNodeDecisionMap($this->decisionObj->age_13_18());
        $rootChildTwo->setNextNodeMap($rootChildNextNode22);

        $rootChildTwo3 = new Node(123, 'branch', '女-19-33', '美妆');
        $rootChildTwo3->setParentId($rootChildTwo->getId());
        $rootChildTwo3->setNodeDecisionMap($this->decisionObj->age_19_33());
        $rootChildTwo->setChildMap($rootChildTwo3);
        // 子节点2绑定指向决策
        $rootChildNextNode23 = new NextNode($rootChildTwo->getId(), $rootChildTwo3->getId());
        $rootChildNextNode23->setNodeDecisionMap($this->decisionObj->age_19_33());
        $rootChildTwo->setNextNodeMap($rootChildNextNode23);

        $rootChildTwo4 = new Node(124, 'branch', '女-34-99', '母婴');
        $rootChildTwo4->setParentId($rootChildTwo->getId());
        $rootChildTwo4->setNodeDecisionMap($this->decisionObj->age_34_99());
        $rootChildTwo->setChildMap($rootChildTwo4);
        // 子节点2绑定指向决策
        $rootChildNextNode24 = new NextNode($rootChildTwo->getId(), $rootChildTwo4->getId());
        $rootChildNextNode24->setNodeDecisionMap($this->decisionObj->age_34_99());
        $rootChildTwo->setNextNodeMap($rootChildNextNode24);

        return $rootNode;
    }
}
