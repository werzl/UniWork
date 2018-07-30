package Assignment1.Exercise2;

/**
 * Created by Adam on 15/02/2017.
 */
public class BSTMain {
    public static void main(String[] args) {
        BST b = new BST();
        b.insert(1);
        b.insert(2);
        b.insert(3);
        b.insert(4);
        b.insert(5);
        b.insert(6);
        b.insert(7);
        b.insert(8);
        b.insert(9);
        b.insert(10);

        for (int i = 0; i < 10; i++)
            System.out.println("b.nth(" + i + ") = " + b.nth(i));


        System.out.println();

        for (int i = 0; i < 10; i++)
            System.out.println("b.greater(" + i + ") = " + b.greater(i));


    }

}
