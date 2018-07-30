#ifndef _STUDENT_H_
#define _STUDENT_H_

#include <iostream>
#include <string>
#include <map>
#include <stdexcept>
#include <iomanip>
#include <algorithm>
#include "Person.h"

using namespace std;

class NoMarkException: public exception
{
};

class Student: public Person
{   public:		
        // constructor should initialise name and registration number using arguments
        // and initialise marks map to be empty
        Student(const string &name, int regNo);

	    // method to return registration number
	    int getRegNo() const;

	    // method to add the mark to the map
	    // if a mark for the module is already present it should be overwritten
	    void addMark(const string& module, float mark);

	    // method to retrieve the mark for a module
	    // should throw NoMarkException if student has no mark for that module
	    float getMark(const string &module) const throw (NoMarkException);
		
		// method to retrieve the average mark for a module
		// should throw NoMarkException if student has no mark for that module
		float getAverageMark() const;
		
		// integer to keep track of how many modules a student has marks for
		int amountOfMarks;

	private:
	    int regNo;
	    map<string, float> marks;  // keys are modules, values are marks in range 0.0 to 100.0
		
		

	// friend function to output details of student so stream
	// should output name, regno, and minimum, maximum and average marks on a single line
	// if the student has no marks "no marks" should be output instead of the marks
	friend ostream& operator<<(ostream &str, const Student &s);
};

#endif