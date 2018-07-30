/**
 * ahewit - 1501801
 * CE204 Assignment 2
 * ExpTree.java
 */

package Assignment2;

import Lab2.Stacks.Stack;

public class ExpTree {

    private int kind;
    private Object value = null;
    private ExpTree lChild, rChild;

    public static final int numNode = 0, idNode = 1, opNode = 2;

    public ExpTree(int knd, Object val, ExpTree l, ExpTree r){
        kind = knd;
        value = val;
        lChild = l;
        rChild = r;
    }



    // part 4 - evaluation method to calculate value of expression tree
    public int evaluate(ExpTree tree){
        String alpha = "zyxwvutsrqponmlkjihgfedcba";
        if (tree.kind == 1) {
            for (int i = 0; i < alpha.length(); i++) {
                if (alpha.charAt(i) == (char) tree.value)
                    return i;
            }
        }


        if (tree.kind == 0) {
            return (int)tree.value;
        }


        if (tree.kind == 2) {
            switch ((char)tree.value) {
                case '+':
                    return evaluate(tree.lChild) + evaluate(tree.rChild);

                case '-':
                    return evaluate(tree.lChild) - evaluate(tree.rChild);

                case '*':
                    return evaluate(tree.lChild) * evaluate(tree.rChild);

                case '/':
                    return evaluate(tree.lChild) / evaluate(tree.rChild);

                case '%':
                    return evaluate(tree.lChild) % evaluate(tree.rChild);
            }
        }

        return 0;
    }




    public String preOrderString(ExpTree tree) {
        if (tree == null)
            return "";
        else
            return tree.value+ " " + preOrderString(tree.lChild) + " " + preOrderString(tree.rChild);

    }


    // part 5 - toString method returns in-order traversal
    private String toString(ExpTree tree) {
        String s1, s2;

        if (tree == null)
            return "";
        else {
            s1 = toString(tree.lChild);
            s2 = toString(tree.rChild);


            if (tree.kind == 2) {
                switch ((char) tree.value) {

                    // parent is divide
                    case '/':
                        // check left child
                        if (tree.lChild.kind == 2) {
                            if ((char) tree.lChild.value == '+' | (char) tree.lChild.value == '-')
                                s1 = "(" + s1 + ")";
                        }

                        // check right child
                        if (tree.rChild.kind == 2) {

                            if ((char) tree.rChild.value == '+' | (char) tree.rChild.value == '-')
                                s2 = "(" + s2 + ")";

                            if ((char) tree.rChild.value == '/' | (char) tree.rChild.value == '*' | (char) tree.rChild.value == '%')
                                s2 = "(" + s2 + ")";
                        }
                        break;




                    // parent is multiply
                    case '*':
                        // check left child
                        if (tree.lChild.kind == 2) {
                            if ((char) tree.lChild.value == '+' | (char) tree.lChild.value == '-')
                                s1 = "(" + s1 + ")";
                        }

                        // check right child
                        if (tree.rChild.kind == 2) {
                            if ((char) tree.rChild.value == '+' | (char) tree.rChild.value == '-')
                                s2 = "(" + s2 + ")";
                            if ((char) tree.rChild.value == '/' | (char) tree.rChild.value == '*' | (char) tree.rChild.value == '%')
                                s2 = "(" + s2 + ")";
                        }
                        break;



                    // parent is modulo
                    case '%':
                        // check left child
                        if (tree.lChild.kind == 2) {
                            if ((char) tree.lChild.value == '+' | (char) tree.lChild.value == '-')
                                s1 = "(" + s1 + ")";
                        }

                        // check right child
                        if (tree.rChild.kind == 2) {
                            if ((char) tree.rChild.value == '+' | (char) tree.rChild.value == '-')
                                s2 = "(" + s2 + ")";
                            if ((char) tree.rChild.value == '/' | (char) tree.rChild.value == '*' | (char) tree.rChild.value == '%')
                                s2 = "(" + s2 + ")";
                        }
                        break;



                    // parent is plus
                    case '+':
                        // check for another + or -
                        if (tree.rChild.kind == 2) {
                            if ((char) tree.rChild.value == '+' | (char) tree.rChild.value == '-')
                                s2 = "(" + s2 + ")";
                        }
                        break;


                    // parent is minus
                    case '-':
                        // check for another + or -
                        if (tree.rChild.kind == 2) {
                            if ((char) tree.rChild.value == '+' | (char) tree.rChild.value == '-')
                                s2 = "(" + s2 + ")";
                        }
                        break;

                }
            }



            return s1 + tree.value + s2;
        }

    }

    @Override
    public String toString(){

        return toString(this);
    }

}
