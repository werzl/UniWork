/*
	UpperCase.h, for CE221 Assignment 2 (Exercise 2)
	Written by Adam Hewitt: 1501801
*/

#ifndef _UPPERCASE_H
#define _UPPERCASE_H

#include "ReadWords.h"

class UpperCase : public ReadWords
{
	public:
		// constructor
		UpperCase(string &wordfile);
		
		// virtual function, override from ReadWords
		bool filter(string word);	
};

#endif