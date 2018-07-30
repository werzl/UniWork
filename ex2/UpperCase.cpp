/*
	UpperCase.cpp, for CE221 Assignment 2 (Exercise 2)
	Written by Adam Hewitt: 1501801
*/

#include "UpperCase.h"

UpperCase::UpperCase(string &wordfile):
	ReadWords(wordfile){};

// return true if the first letter of a string is a capital letter
bool UpperCase::filter(string word) {
	
	if (!word.empty()) {
		if( isupper(word[0]) ) return true;
		else return false;	
	}
}