#!/usr/bin/env python
# -------------------------------------------------------------------------------
#		ir.py (70%)
# -------------------------------------------------------------------------------
# Solution to CE306 Assignment 1 (2018)
# 
# AUTHOR
#	Adam Hewitt
# 	Registration Number 1501801
# 	This program is entirely my own work



import sys, nltk, urllib
from nltk.corpus import stopwords
from nltk.stem import WordNetLemmatizer
from bs4 import BeautifulSoup



# -------------------------------------------------------------------------------
#		FUNCTIONS
# -------------------------------------------------------------------------------

# Input/Output (10%)
def getPage(URL):
	""" Open a URL and return its soup (source code) """
		
	# IF USING PYTHON 3
	page = urllib.request.urlopen(URL).read()

	# IF USING PYTHON 2
	#page = urllib.urlopen(URL).read()
	
	
	soup = BeautifulSoup(page, 'html.parser')
	
	return soup
	
	
	
# HTML Parsing (10%)
def parsePage(soup):
	""" Parse HTML web page using BS, return tag-free plaintext. """
	
	# Remove all script tags, when I first ran the program on the KSJ Award page, 
	# it retrieved an entire JavaScript function and since that content isn't needed, 
	# I can remove all scripts on each page
	for script in soup("script"):
		script.decompose()
	
	text = soup.get_text().replace("\n\n", " ")
	
	
	# Find and add meta tag content to the beginning of the text
	for mtag in soup.find_all( 'meta', attrs={'name' : 'description'} ):
		text += mtag["content"]
	
	return text
	
	
	
# Pre-processing: Sentence Splitting, Tokenization and Normalization (10%)
def preProcessing(parsedPageString):
	""" Transform web page plaintext into a normal form (NLTK tokens)"""
	
	# Normalization	
	parsedPageString = parsedPageString.lower()
	
	# Tokenization - Removes punctuation and calls tokenizer from nltk, each word
	# becomes a separate token
	text_tokens = [word for word in nltk.word_tokenize(parsedPageString) if nltk.re.search("\w", word)]
	
	return text_tokens
	
	
	
# Part-of-Speech Tagging (10%)
def posTag(t):
	""" POS Tag a list of tokens """
	
	# Returns each token with its POS tag side by side in a sequence
	return nltk.pos_tag(t)
	
	
	
# Selecting Keywords (10%)
def selection(taggedPage):
	""" Identify key tokens and remove ones that aren't useful """
	
	stopWords = stopwords.words('english')
	tagFilter = ['NN', 'VB', 'JJ']
	
	# Stopwords
	# Iterate through entire POS tagged list and remove words matching set of stopwords
	swRemoved = []
	for tw in taggedPage:
		if tw[0] not in stopWords:
			swRemoved.append(tw)
			
			
	# Extract POS nouns and noun phrases using tagFilter
	tagFiltered = []
	for tw in swRemoved:
		if tw[1][0:2] in tagFilter:
			tagFiltered.append(tw)
	
	
	# Frequency Distribution
	fdist = nltk.FreqDist(tagFiltered)
	
	# List of the 15 most commonly occuring words in the text
	keywordList = []
	for w in fdist.most_common(15):
		keywordList.append(w[0][0])

	# Return a new list without the 15 keywords
	removed = []
	for tw in tagFiltered:
		if tw[0] not in keywordList:
			removed.append(tw)
	
	
	return removed
	
	
	
# Stemming or Morphological Analysis (10%)
def stem(selectedWords):
	""" Perform Morphological Analysis on tokens using the Lemmatizer function from NLTK"""

	# Initialise Lemmatizer
	lem = WordNetLemmatizer()
	
	lemmas = []
	
	# Lemmatize each token and add it to a list
	for w in selectedWords:
		lemmas.append(lem.lemmatize(w[0]))
	
	return lemmas
	
	
	
# Engineering a Complete System (10%)
def callFuncs(URL):
	""" Call all of the above functions from one call, return the result after it has gone through each stage """
	
	# Input/Output (10%)	
	soup = getPage(URL)


	# HTML Parsing (10%)
	pageText = parsePage(soup)


	# Pre-processing: Sentence Splitting, Tokenization and Normalization (10%)
	tokenizedPage = preProcessing(pageText)
	
	
	# Part-of-Speech Tagging (10%)
	taggedPage = posTag(tokenizedPage)
	
	
	# Selecting Keywords (10%)
	selectedWords = selection(taggedPage)
	
	
	# Stemming or Morphological Analysis (10%)
	stems = stem(selectedWords)
	
	
	
	
	### Printing to text file
	# Print Results of each step above in a text file with the Title of the webpage
	# as the filename
	
	# Get title of web page and set filename for output
	soupTitle = soup.find('title')
	urlTitle = soupTitle.get_text()
	filename = "Output_" + urlTitle + ".txt"
		
	# Open file
	file = open(filename, "w")
	
	
	# Write Title
	file.write("-"*200 + "\nWeb Page: " + URL + "\n" + "-"*200 + "\n")
	
	
	# Write Input/Output
	file.write("-"*200 + "\nInput/Output " + "\n" + "-"*200 + "\n")
	file.write(str(soup) + "\n" + "-"*200 + "\n")
	
	
	# Write HTML Parsing
	file.write("-"*200 + "\nHTML Parsing " + "\n" + "-"*200 + "\n")
	file.write(str(pageText) + "\n" + "-"*200 + "\n")
	
	
	# Write Pre-processing
	file.write("-"*200 + "\nPre-processing " + "\n" + "-"*200 + "\n")
	file.write(str(tokenizedPage) + "\n" + "-"*200 + "\n")
	
	
	# Write POS Tagging
	file.write("-"*200 + "\nPOS Tagging " + "\n" + "-"*200 + "\n")
	file.write(str(taggedPage) + "\n" + "-"*200 + "\n")
	
	
	# Write Keywords
	file.write("-"*200 + "\nSelecting Keywords " + "\n" + "-"*200 + "\n")
	file.write(str(selectedWords) + "\n" + "-"*200 + "\n")
	
	
	# Write Stemming / Morphological Analysis
	file.write("-"*200 + "\nStemming or Morphological Analysis " + "\n" + "-"*200 + "\n")
	file.write(str(stems) + "\n" + "-"*200)
	

	file.close
	print("File '" + filename + "' created... \n")
	
	
	
	
	return stems
	
# -------------------------------------------------------------------------------
	
	
	
# -------------------------------------------------------------------------------
#		MAIN PROGRAM
# -------------------------------------------------------------------------------

# Handles no arguments on command line
if len(sys.argv) < 2:
	print("Invalid Argument, Usage: " + str(sys.argv[0]) + " URL... ")
	sys.exit(1)
	
	
# Perform call to all of the functions using URL given on command line and
# print any errors
try:
	print( "-"*100 + "\nIndexed Words for URL: " + sys.argv[1] + "\n" + "-"*100 + "\n")
	print(callFuncs(sys.argv[1]))
	print("\n" + "-"*100)
except Exception as inst:
	print(type(inst))
	

# -------------------------------------------------------------------------------



# -------------------------------------------------------------------------------
#		END OF 1501801.py
# -------------------------------------------------------------------------------