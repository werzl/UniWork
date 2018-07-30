/*
	Student class, for CE221 Assignment 2 (Exercise 1)
	Written by Adam Hewitt: 1501801
*/

#include "Student.h"

using namespace std;

// constructor
Student::Student(const string &name, int regNo) : Person::Person(name){
	this->regNo = regNo;
	this->name = name;
	amountOfMarks = 0;
}

// method to return registration number
int Student::getRegNo() const { 
	return regNo; 
}

// method to add a mark to the marks map
void Student::addMark(const string& module, float mark) {
	marks.erase(module); // allows for overriding
	marks.insert ( pair<string,float>(module, mark) );
	amountOfMarks++;
}

// method to retrieve the mark for a module
// searches the map using an iterator and returns the value attached to the matching key(module)
float Student::getMark(const string &module) const throw (NoMarkException) {
	
	map<string, float>::const_iterator search = marks.find(module);
	if ( search != marks.end() ) {
		return search->second;
	} else {
		throw NoMarkException();
	}
	
}


// method to retrieve the average mark from marks map
// uses iterator to compare each item in map
float Student::getAverageMark() const {
		
	map<string, float>::const_iterator it;
	float average = 0;
	for (it = marks.begin(); it != marks.end(); it++) {
		average += it->second;
	}
	
	if (average > 0) {
		return average/marks.size();
	} else {
		return 0;
	}
}


// overloaded operator to output details of Student object
ostream& operator<<(ostream &str, const Student &s) {

	// for loop to calculate and store the MINIMUM mark of Student
	// 		uses iterator to compare each item in map
	float min = s.marks.begin()->second;
	map<string, float>::const_iterator minIt;
	for (minIt = s.marks.begin(); minIt != s.marks.end(); minIt++) {
		if (min > minIt->second) {
			min = minIt->second;
		} 
	}
	
	
	// for loop to calculate and store the MAXIMUM mark of Student
	float max = 0;
	map<string, float>::const_iterator maxIt;
	for (maxIt = s.marks.begin(); maxIt != s.marks.end(); maxIt++) {
		if (max < maxIt->second) {
			max = maxIt->second;
		}
	}
	
	if (min <= 0) min = max;
		
	str << s.regNo << " - " << s.name << " - Minimum mark: " << min << " - Maximum mark: " << max 
					<< " - Average mark: " <<s.getAverageMark();
    return str;
}