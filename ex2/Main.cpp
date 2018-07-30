/*
	Main.cpp, for CE221 Assignment 2 (Exercise 2)
	Written by Adam Hewitt: 1501801
*/

#include "UpperCase.h"
#include "Digits.h"
#include "Punct.h"

int main() {
	
	map<string, int> occurences;
	
	// get file name
	string input;
	cout << "Enter name of file: ";
	cin >> input;
	
	
	// get choice of function
	cout << "Which function would you like to run?" 
		<< endl
		<< "1 - Upper Case"
		<< " | 2 - Digits"
		<< " | 3 - Punctuation"
		<< endl
		<< endl;
	char choice;
	cin >> choice;
	
	// create a new object and use it to add to dictionary, the words that satisfy the filter
	switch(choice) {
		
		case '1': {
			UpperCase uC(input);
			while (uC.isNextWord()) ++occurences[uC.getNextFilteredWord()];
		}	break;
			
			
		case '2': {
			Digits d(input);
			while (d.isNextWord()) ++occurences[d.getNextFilteredWord()];
		}	break;
			
			
		case '3': {
			Punct p(input);
			while (p.isNextWord()) ++occurences[p.getNextFilteredWord()]; 
		}	break;
			
		default:
			cout << choice << "Invalid Option" << endl;
	}
	
	
	// iterator to calculate smallest and largest occurence count as well as total number of entries
	int numOfEntries = 0;
	
	int largest = 0;
	map<string, int> largestEntries;
	
	int smallest = occurences.begin()->second;
	map<string, int> smallestEntries;
	
	// iterator compares the value for each key in map (stored in temp) to the int variables: largest and smallest
	for (map<string, int>::iterator it=occurences.begin(); it!=occurences.end(); it++) {
		numOfEntries++;
			
		//cout << it->second << " occurences of: " << it->first << endl; // will print all items in dictionary
		
		int temp = it->second;
		
		if (temp > largest) {	
			largest = temp;
			largestEntries.insert(pair<string, int>(it->first, it->second));
		}
		if (temp < smallest) {	
			smallest = temp;
			smallestEntries.insert(pair<string, int>(it->first, it->second));
		}
	}
	
	cout << endl << "Total number of entries: " << numOfEntries << endl;
	
	cout << "Largest Entries: " << endl;
	for (map<string, int>::iterator lIt=largestEntries.begin(); lIt!=largestEntries.end(); lIt++) {
		if (lIt->second )
		cout << lIt->second << " Occurences of: " << lIt->first << endl;
	}	
	
	cout << endl << "Smallest Entries: " << endl;
	for (map<string, int>::iterator sIt=smallestEntries.begin(); sIt!=smallestEntries.end(); sIt++) {
		if (sIt->second )
		cout << sIt->second << " Occurences of: " << sIt->first << endl;
	}
	
}