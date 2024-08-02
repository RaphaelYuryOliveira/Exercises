<?php

#Tree: Preorder Traversal (Hackerrank)

class TreeNode {
    
    public int $value;
    public ?TreeNode $leftChild = null; 
    public ?TreeNode $rightChild = null;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function addLeftChild(TreeNode $node)
    {
        $this->leftChild = $node;
        return;
    }

    public function addRightChild(TreeNode $node)
    {
        $this->rightChild = $node;
        return;
    }
}

class Tree {
    public TreeNode $root;

    public function __construct(TreeNode $root)
    {
        $this->root = $root;
    }

    public function addNode(TreeNode $node) 
    {
        $this->findParent($node, $this->root);
    }

    private function findParent(TreeNode $node, TreeNode $reference) 
    {
        if($node->value > $reference->value) {
            if($reference->rightChild === null) {
                $reference->rightChild = $node;
                return $reference;
            }

            return $this->findParent($node, $reference->rightChild);
        }

        if($node->value < $reference->value) {
            if($reference->leftChild === null) {
                $reference->leftChild = $node;
                return $reference;
            }

            return $this->findParent($node, $reference->leftChild);
        }
    }

    public function traversePreOrder(?TreeNode $node) {
        if ($node == null) {
            return;
        }

        echo $node->value . " ";

        $this->traversePreOrder($node->leftChild);
        $this->traversePreOrder($node->rightChild);
    }
}


$tree = new Tree(new TreeNode(5));
$tree->addNode(new TreeNode(2));
$tree->addNode(new TreeNode(6));
$tree->addNode(new TreeNode(1));
$tree->addNode(new TreeNode(3));



$tree->traversePreOrder($tree->root);

