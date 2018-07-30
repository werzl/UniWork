/*
	Punct.cpp, for CE221 Assignment 2 (Exercise 2)
	Written by Adam Hewitt: 1501801
*/

#include "Punct.h"

Punct::Punct(string &wordfile):
	ReadWords(wordfile){};
	
// function to return true if a word contains exactly one punctuation mark
bool Punct::filter(string word) {
	int i = 0;
	int punctCount = 0;
	
	// iterates through a non-empty string and increments punctCount
	if (!word.empty()) {
		while (word[i]) {
			if ( ispunct(word[i]) ) {
				punctCount++;
			}
			
			i++;
		}
	}
	
	return punctCount == 1; // returns true if there's only 1 punctuation mark
}