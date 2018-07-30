/*
	Digits.cpp, for CE221 Assignment 2 (Exercise 2)
	Written by Adam Hewit: 1501801
*/

#include "Digits.h"

Digits::Digits(string &wordfile):
	ReadWords(wordfile){};
	
// function to Return true if a string contains two adjacent digits
bool Digits::filter(string word) {
	int i = 0;
	
	// iterates through a non-empty string and returns using isdigit()
	if (!word.empty()) {
		for (i; i < word.size(); i++) {
			if (  isdigit(word[i]) && isdigit(word[i+1])  ) {
				return true;
				break;
			}
		} 
	}
	
	return false;
}
