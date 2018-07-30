/*
	Digits.h, for CE221 Assignment 2 (Exercise 2)
	Written by Adam Hewitt: 1501801
*/

#ifndef _DIGITS_H
#define _DIGITS_H

#include "ReadWords.h"

class Digits : public ReadWords
{
	public:
		// constructor
		Digits(string &wordfile);
		
		// virtual function, override from ReadWords
		bool filter(string word);
};

#endif