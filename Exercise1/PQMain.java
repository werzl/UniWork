package Assignment1.Exercise1;

/**
 * Adam Hewitt - 1501801
 * CE204 Assignment 1, Exercise 1
 */

public class PQMain {
    public static void main(String[] args) {

        // testing all operations from PriorityQueue
        PriorityQueue Q = new PriorityQueue();

        // addtopq()
        Q.addtopq("hello", 5);
        Q.addtopq("hi", 1);
        System.out.println("\n" + "Queue Contents: " + Q);

        // addtopq()
        System.out.println("Adding \"ho\" with priority 3");
        Q.addtopq("ho", 3);
        System.out.println("Queue Contents: " + Q);

        // deletefront()
        System.out.println("Calling deletefront");
        Q.deletefront();
        System.out.println("Queue Contents: " + Q);

        // frontpri()
        System.out.println("Calling frontpri: " + Q.frontpri() + " returned");

        // isempty()
        System.out.println("Calling isempty: " + Q.isempty() + " returned" + "\n");



        // testing exceptions for frontpri, front and deletefront on an empty queue
        PriorityQueue exceptionQ = new PriorityQueue();

        // frontpri()
        try {
            exceptionQ.frontpri();
        } catch (QueueException e){
            System.out.println(e);
        }

        // front()
        try {
            exceptionQ.front();
        } catch (QueueException e){
            System.out.println(e);
        }

        // deletefront()
        try {
            exceptionQ.deletefront();
        } catch (QueueException e){
            System.out.println(e);
        }

        // testing addtopq by trying to add a priority greater than 20
        try {
            Q.addtopq("Hi", 21);
        } catch (QueueException e){
            System.out.println(e);
        }

        // Testing Priorities
        PriorityQueue testPriorityQueue = new PriorityQueue();
        testPriorityQueue.addtopq("A", 10);
        testPriorityQueue.addtopq("B", 9);
        testPriorityQueue.addtopq("C", 8);
        testPriorityQueue.addtopq("D", 7);
        testPriorityQueue.addtopq("E", 6);
        testPriorityQueue.addtopq("F", 5);
        testPriorityQueue.addtopq("G", 4);
        testPriorityQueue.addtopq("HighestTest", 11);
        testPriorityQueue.addtopq("HighestTest2", 13);
        testPriorityQueue.addtopq("DuplicateTest", 9);

        System.out.println("\n" + testPriorityQueue);
    }
}