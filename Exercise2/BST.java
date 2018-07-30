package Assignment1.Exercise2;

/**
 * Adam Hewitt - 1501801
 * CE204 Assignment 1, Exercise 2
 */

import java.util.ArrayList;
import java.util.List;
import java.util.NoSuchElementException;

public class BST {
    private BTNode<Integer> root;

  public BST() {
    root = null;
  }

  public boolean find(Integer i)
  { BTNode<Integer> n = root;
    boolean found = false;

    while (n!=null && !found)
    { int comp = i.compareTo(n.data);
      if (comp==0)
        found = true;
      else if (comp<0)
        n = n.left;
      else
        n = n.right;
	}

    return found;
  }

  public boolean insert(Integer i) {
      BTNode<Integer> parent = root, child = root;
    boolean goneLeft = false;

    while (child!=null && i.compareTo(child.data)!=0)
    { parent = child;
      if (i.compareTo(child.data)<0)
	  { child = child.left;
	    goneLeft = true;
	  }
	  else
	  { child = child.right;
	    goneLeft = false;
      }
	}

    if (child!=null)
      return false;  // number already present
    else
    { BTNode<Integer> leaf = new BTNode<Integer>(i);
      if (parent==null) // tree was empty
        root = leaf;
      else if (goneLeft)
        parent.left = leaf;
      else
        parent.right = leaf;
      return true;
    }
  }


/**
 * Start of Assignment Code
 */


  // recursive algorithm to count amount of child Nodes a node has by adding all of the nodes to the left
  //    and to the right of the root, and 1 for the root.
  private int Nodes(BTNode n){
      if (n == null)
          return 0;
      else {
          return (  (n.left == null? 0 : Nodes(n.left))  +  (n.right == null? 0 : Nodes(n.right))  +  1  );
      }
  }


  // greater method: returns amount of items greater than n
  public int greater(int n) {
      Integer element = n; // n is stored in an Object for use with the compareTo function
      ArrayList<BTNode<Integer>> nodeList = new ArrayList(); // Array to store Nodes larger than n
      BTNode cn = root;
      int count = 0;

      // in the loop, if statements compare the current node to n
      while (cn != null) {

          // IF n < current node, move left in tree and store current node
          if (element.compareTo((Integer) cn.data) < 0) {
              nodeList.add(cn);
              cn = cn.left;
          }

          // IF n > current node, move right in tree
          else if (element.compareTo((Integer) cn.data) > 0) {
              cn = cn.right;
          }

          // IF n = current node, stop loop and store current node
          else if (element.compareTo((Integer) cn.data) == 0) {
              nodeList.add(cn);
              break;
          }
      }

      // iterates through the array of Nodes that are larger than n and
      //    performs a count of all their right child Nodes
      for (BTNode i : nodeList){
          count++;
          count += Nodes(i.right);

          if (i.data == element)
              count--;
      }

      return count;
  }


  // nth method: returns the item at n in the tree
  public int nth(int n) {
      int count = -1;
      BTNode currentPos = root;

      if (n < 0 || n >= Nodes(currentPos)) throw new NoSuchElementException();

      // loop iterates through the tree (using currentPos = currentPost.left), until it finds
      //    an item which; the sum of its left nodes is less than n
      while (currentPos != null){
          int countNodes = Nodes(currentPos.left)+1+count;
          if (countNodes > n && Nodes(currentPos.left) != 0) {
              currentPos = currentPos.left;

          }

          // if countNodes is less than n, updates a count, then breaks the loop if count == n
          else {
              count += Nodes(currentPos.left);
              count++;
              if (count == n)
                  break;
              currentPos = currentPos.right;
          }

      }


      return (int) (currentPos.data);
  }

}


/**
 * end of Assignment Code
 */


class BTNode<T>
{ T data;
  BTNode<T> left, right;

  BTNode(T o)
  { data = o; left = right = null;
  }
}
