/**
 * ahewit - 1501801
 * CE204 Assignment 2
 * Ass2.java
 */

package Assignment2;

import java.util.InputMismatchException;
import java.util.Scanner;


public class Ass2 {

    public static void main(String[] args) {
        Parser p = new Parser();
        boolean cont = true;
        char choice = 'y';

        // output
        System.out.println("Adam Hewitt - 1501801");
        System.out.println("Welcome to Adam's expression evaluation program. Please type an expression");


        // loop to get expression & perform operations
        do {
            if (choice == 'y') {
                try {
                    ExpTree myTree = p.parseLine();




                    System.out.println("Pre-order: " + myTree.preOrderString(myTree));


                    try {
                        System.out.println("Result: " + myTree.evaluate(myTree));
                    } catch (ArithmeticException e) {
                        System.out.println(e);
                    }


                    System.out.println("Expression: " + myTree);


                } catch (ParseException e) {
                    System.out.println(e);
                }
            }


            System.out.println("Another expression? (y/n)");
            Scanner scanner = new Scanner(System.in);
            try {choice = scanner.nextLine().toLowerCase().charAt(0);} catch (StringIndexOutOfBoundsException e) {
                choice = ' ';
            }
            System.out.println();
            if (choice == 'n')
                cont = false;
            else if (choice == 'y')
                System.out.println("Please type an expression.");
            else
                System.out.println("Error: Invalid Choice");


        } while(cont == true);






    }

}
