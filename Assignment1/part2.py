#!/usr/bin/env python
# -------------------------------------------------------------------------------
#		PART2: Regular Expressions, FSAs and FSTs (30%)
# -------------------------------------------------------------------------------
# Solution to part 2 of CE314 Assignment 1 (2017)
# 
# AUTHOR
# 	Registration Number 1501801
# 	This program is entirely my own work


from nltk import re
import urllib
from bs4 import BeautifulSoup


# -------------------------------------------------------------------------------
#		ROUTINES
# -------------------------------------------------------------------------------
def getHtmlText(URL):
	""" Open a URL and retrieve the tags relevant to text of the page. """
	
	# IF USING PYTHON 3
	bbc = urllib.request.urlopen(URL).read()


	# IF USING PYTHON 2
	#bbc = urllib.urlopen(URL).read()
	
	
	t = []
	
	soup = BeautifulSoup(bbc, 'html.parser')
	
	# Iterates through the entire HTML source and adds tags to a sequence
	for i in soup.find_all( ['p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'] ):
		a = ""
		text = i.get_text()
		for line in text.splitlines():
			a += line
		t.append(a)
	
	
	return t

	
	
def findCurrency(text):
	""" Display information about the found strings """
		
	symbols = "$£eurospoundsdollars"
	
	
	# Iterate through each item in text and find all strings matching a regular
	# expression to find all amounts of money
	for i in text:
		matches = re.findall('((?:(?:\$|£)(?:\d+)(?:\.?\d*,?\d{1,3})(?:bn|m)?)|'\
		'(?:(?:\d+)(?:\.?,?\d)*(?:bn|m)?(?: ?euros?| ?dollars?| ?pounds?| ?p)))',\
			i, re.IGNORECASE)

		# If a match is found, check the currency and amount, print 
		if matches:
			for m in matches:		
				if re.search('\$|dollars?', m, re.IGNORECASE): currency = "Dollar"
				if re.search('\£|pounds?|p', m, re.IGNORECASE): currency = "Pound"
				if re.search('euros?', m, re.IGNORECASE): currency = "Euro"

				amount = m.strip(symbols)

				print("Found a match!" + "\nCurrency:", currency, "\nAmount:",\
					amount, "\n") 

#--------------------------------------------------------------------------------


	
# -------------------------------------------------------------------------------
#		MAIN PROGRAM
# -------------------------------------------------------------------------------

print("\nPART2: Regular Expressions, FSAs and FSTs (30%)\nRegistration Number: 1501801\n")
text = getHtmlText("http://www.bbc.co.uk/news/business-41779341")

findCurrency(text)

# -------------------------------------------------------------------------------



# -------------------------------------------------------------------------------
#		END OF PART2
# -------------------------------------------------------------------------------