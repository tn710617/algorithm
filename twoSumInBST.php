<?php

class TreeNode
{

    public $val = null;
    public $left = null;
    public $right = null;

    function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution
{

    /**
     * Definition for a binary tree node.
     * class TreeNode {
     *     public $val = null;
     *     public $left = null;
     *     public $right = null;
     *     function __construct($val = 0, $left = null, $right = null) {
     *         $this->val = $val;
     *         $this->left = $left;
     *         $this->right = $right;
     *     }
     * }
     */

    /**
     * @param  TreeNode  $root
     * @param  Integer  $k
     * @return Boolean
     */
    function findTarget($root, $k)
    {
        $result = $this->find($set, $k, $root);

        return $result;
    }

    private function find(&$set, $k, $root): bool
    {
        if ($root === null) {
            return false;
        }
        if (array_key_exists($k - $root->val, $set)) {
            return true;
        }

        $set[$root->val] = true;

        return $this->find($set, $k, $root->right) || $this->find($set, $k, $root->left);
    }
}


$treeRoot = new TreeNode(2);
$treeNode1 = new TreeNode(1);
$treeNode2 = new TreeNode(3);

$treeRoot->left = $treeNode1;
$treeRoot->right = $treeNode2;
$solution = new Solution();

$root = $treeRoot;
$target = 4;

print $solution->findTarget($root, $target);