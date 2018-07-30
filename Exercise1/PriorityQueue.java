package Assignment1.Exercise1;

/**
 * Adam Hewitt - 1501801
 * CE204 Assignment 1, Exercise 1
 */

class Queue {
    String data; // Instance Variable: first part of a queue item
    int priority; // Instance Variable: second part of a queue item
    Queue next; // Instance Variable: used to iterate through queue

    // Queue, stores a string, int and the next queue item in the collection
    public Queue(String d, int p, Queue q) {
        data = d;
        priority = p;
        next = q;
    }
}



// QueueExceptions returned in front(), deletefront() and frontpri()
class QueueException extends RuntimeException {
    public QueueException(String s) {
        super(s);
    }
}


public class PriorityQueue {
    private Queue front; // Instance Variable: queue to be edited

    public PriorityQueue() {
        front = null; // initialise queue to be empty
    }


    // returns the data for the first item in the queue
    public String front(){
        if (front == null)
            throw new QueueException("Exception: Empty Queue");
        else
            return front.data + " " +  front.priority;
    }


    // deletes the first item in the queue
    public void deletefront() {
        if (front == null)
            throw new QueueException("Exception: Empty Queue");
        else
            front = front.next;
    }


    // returns the priority for the first item in the queue
    public int frontpri() {
        if (front == null)
            throw new QueueException("Exception: Empty Queue");
        else
            return front.priority;
    }


    // adds an item to the queue
    public void addtopq(String data, int p) {
        if (p > 20 || p < 1)
            throw new QueueException("Exception: Invalid Priority Value");
        else if (front == null)
            front = new Queue(data, p, null);
        else {
            Queue q = front;


            // loop iterates through each item in the Queue (using q=q.next)
            while (q.next != null ) {
                if (q.next.priority < p) {
                    // accesses the current item at the front, if its priority is lower than input,
                    //     adds the input to the first position and shifts front item along in the queue
                    if (q.priority < p) {
                        q.next = new Queue(q.data, q.priority, q.next);
                        front = new Queue(data, p, q.next);
                    }

                    break;
                }
                q = q.next;
            } // end of loop


            q.next = new Queue(data, p, q.next);

        }
    }


    // isempty function
    public boolean isempty() {
        return(front == null);
    }


    // toString method creates and appends a stringbuffer to print all items in the priority queue
    public String toString() {
        StringBuffer sb = new StringBuffer("<");
        Queue tS = front;
        while (tS != null) {
            sb.append(tS.data);
            sb.append(":");
            sb.append(tS.priority);
            if (tS.next != null)
                sb.append(", ");
            tS = tS.next;
        }
        return(sb + ">");
    }
}