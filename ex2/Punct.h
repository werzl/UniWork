/*
	Punct.h, for CE221 Assignment 2 (Exercise 2)
	Written by Adam Hewitt: 1501801
*/

#ifndef _PUNCT_H
#define _PUNCT_H

#include "ReadWords.h"

class Punct : public ReadWords
{
	public:
		// constructor
		Punct(string &wordfile);
		
		// virtual function, override from ReadWords
		bool filter(string word);
};

#endif