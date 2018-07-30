/*
	Main class, for CE221 Assignment 2 (Exercise 1)
	Written by Adam Hewitt: 1501801
*/

#include <fstream>
#include <vector>
#include <math.h>
#include "Student.h"

using namespace std;

vector<Student> v; // vector that will contain all student objects


// function to print all student objects with a higher average mark than the 2nd argument
void showAverage(const vector <Student> &vec, float mark) {
	
	cout << "All Students with a mark equal to, or greater than: " << mark << endl;
	
	for (int i = 0; i < vec.size(); i++) {
		if ( vec[i].getAverageMark() >= mark ) {
			cout << vec[i] << endl;
		}
	}
	
}


// function to print all student objects from vector that are taking a 
//			module specified by the 2nd argument
void showModule(const vector <Student> &vec, string module) {
	bool studentsFound = false;
	
	cout << "All Students enrolled on module: " << module << endl;
	
	for (int i = 0; i < vec.size(); i++) {
		try {
			if ( vec[i].getMark(module) ) {
				cout << vec[i] << endl;
				studentsFound = true;
			}
		}
		catch (NoMarkException e) {}
	}
	
	if (!studentsFound) {
		cout << "No Students enrolled on " << module << endl;
	}
}


int main() {
	
	
	// get file name for collections of students
	string input;
	cout << "Enter name of file for Student information: " << endl;
	cin >> input;
	const char* filename = input.c_str();
    ifstream f(filename);
    
	// print error message if file doesn't exist
    if (!f)
    {   cout << "Error: '" << filename << "' couldn't be opened" << endl;
        return 1;   
    }
	
	int rN; // store regNo
	string n; // store name
	bool reading = true;

	// loop to create new Student objects from a file and add them to vector
	while (reading) {
		f >> rN;
		getline(f, n);
		if (!f.eof()) {
			v.push_back(Student(n, rN));
		} else {
			reading = false;
			f.close();
		}
		
	}
	

	// get file name for marks of students
	string input1;
	cout << "Enter name of file for Student marks: " << endl;
	cin >> input1;
	const char* filename1 = input1.c_str();
    ifstream f1(filename1);
    
	// print error message if file doesn't exist
    if (!f1)
    {   cout << "Error: '" << filename1 << "' couldn't be opened" << endl;
        return 1;   
    }
	
	// read marks file
	int reg;
	string module;
	string moduleArr[100];
	float mark;
	bool reading1 = true;
	int count = 0;
		
	// loop to read marks from file and store them in the corresponding object in vector
	while(reading1) {
		f1 >> reg;
		f1 >> module;
		f1 >> mark;
		
		moduleArr[count] = module;
		count++;
		
		if (!f1.eof()) {		
			
			
			for (int i = 0; i < v.size(); i++) {
				try {
					if ( reg == v.at(i).getRegNo() ) {
						v.at(i).addMark(module, mark);
					}
				}
				catch (const out_of_range& e) {}
				
			}
			
			
		
		} else {
			reading1 = false;
			f1.close();
		}
	}
	
	
	// print all students details
	// 		this code attempts to print the marks of the students as well as their name 
	// 			and regNo, it doesn't work perfectly.
	 for (int i = 0; i < v.size(); i++) {
		cout << endl << v[i] << endl;
		for (int j = 0; j < count; j++) {
			try {
				cout << "\t" << moduleArr[j] << " - " << v[i].getMark(moduleArr[j]) << endl;
			}
			catch (NoMarkException e){}
		}
	} 
	
	
	// interactive code for testing
	string choice;
	bool running = true;
	while(running) {
		
		int markChoice;
		string moduleChoice;
		
		cout << endl << "Which Function would you like to test?" << endl << 
							"1 - First Function | 2 - Second Function | 3 - Quit" << endl;
		cin >> choice;
		
		// run first function using user input
		if (choice == "1") {
			cout << "Enter average Mark: ";
			cin >> markChoice;
			
			if (cin.fail()) {
				cout << endl << "Invalid Input, try again" << endl;
				cin.clear();
				cin.ignore();
			} else{ showAverage(v, markChoice); }
		}
		
		// run second function using user input
		else if (choice == "2") {
			cout << "Enter module code (case sensitive): ";
			cin >> moduleChoice;
			
			if (cin.fail()) {
				cout << endl << "Invalid Input, try again" << endl;
				cin.clear();
				cin.ignore();
			} else{ showModule(v, moduleChoice); }
		}
		
		// quit program
		else if (choice == "3") {
			running = false;
		}
		
		else {
			cout << endl << "Invalid Input, try again" << endl;
		}
	}
	
}