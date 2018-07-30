/**
 * ReadWords class, the base class for CE221 Assignment 2 (Exercise 2)
 * original version written by Dave Lyons
 * modified by sands
 */

#ifndef _READWORDS_H
#define _READWORDS_H

using namespace std;
#include <string>
#include <fstream>
#include <iostream>
#include <cctype>
#include <map>
#include <stdlib.h>

class ReadWords
{   public:

		int count;

        /**
         * Constructor. Opens the file with the given filename.
         * Program exits with an error message if the file does not exist.
         * @param filename - a C string naming the file to read.
         */
        ReadWords(const string &filename);

        /**
         * Closes the file.
         */
        void close();

        /**
         * Returns a string, being the next word in the file.
         * @return - string - next word.
         */
        string getNextWord();

        /**
         * Returns true if there is a further word in the file, false if we have reached the
         * end of file.
         * @return - bool - !eof
         */
        bool isNextWord();

        //pure virtual function for filter
        virtual bool filter(string word)=0;

        /**
         * Returns a string, being the next word in the file that satisfies the filter.
         * @return - string - next word that satisfies the filter
         * throws exception if there's no such word
         */
        string getNextFilteredWord();

    private:
	    ifstream wordfile;
		bool eoffound;
		string nextword;

		/**
		  * Fix the word by the definition of "word"
		  * end of file.
		  * @return - string
		  * used by getNextWord
		  */
		string fix(string word);

 };

 #endif
