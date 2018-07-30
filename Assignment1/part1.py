#!/usr/bin/env python
# -------------------------------------------------------------------------------
#		PART1: Tokenization, Part-of-Speech Tagging (40%)
# -------------------------------------------------------------------------------
# Solution to part 1 of CE314 Assignment 1 (2017)
# 
# AUTHOR
# 	Registration Number 1501801
# 	This program is entirely my own work


import nltk
text = """

A Message From The Headmaster
Kow tow!
That’s the Chinese for “hello”, as I’ve learnt this week, because those were the first words said to me by
the Head of our Chinese sister academy, the Tiananmen Not At All Free School.
As you’ve probably gathered, we were rolling out the school “red”(!) carpet this week for Mr Xi Sho-pping,
who was on a visit to try and buy as much of the school as we could sell him.
...
Mr Sho-pping then visited the old boiler room and we signed an agreement for him to build not only a new
nuclear boiler to replace it, but to build another two boilers, just in case the other one blows up, which
it won’t of course. Even better, all the boilers will be run entirely by himself and members of the Beijing
Nuclear Intelligence Services Department, who are delighted to be the given the chance of experimenting
with untried nuclear technology in someone else’s school. How exciting is that! I can’t have been the only
one to feel a warm glow at the thought of so much radioactivity at the very heart of the school. Who
knows, by this time next year I could be the Two-head-master! (Finkelstein, D., you’re on fire – as is the
boiler room!)
D.C.

"""



# -------------------------------------------------------------------------------
#		ROUTINES
# -------------------------------------------------------------------------------

def tokenize(text):
	""" Remove all punctuation and return tokens for a string """
	from nltk import word_tokenize, re
	
	text_tokens = [word for word in word_tokenize(text) if re.search("\w", word)]
	return text_tokens



def idTokens(text):
	""" Removes all punctuation and identifies all of the tokens in 'text' """
	
	print( "All tokens in example sentence:\n", tokenize(text), "\n\n\n" )
	
	
	
# -------------------------------------------------------------------------------
#		Assign part-of-speech tags to all tokens in text (20%)
# -------------------------------------------------------------------------------
def posTag(t):
	""" POS tags each word in a tokenized string """
	from nltk.corpus import brown	
	
	# Tag the example text using a Unigram tagger trained on 10,000 sentences  
	# from the brown corpus and print the first 10 items
	unigramTagger = nltk.tag.UnigramTagger(brown.tagged_sents()[:10000])
	
	print( "First 10 POS Tagged words using Unigram:\n", unigramTagger.tag(t)[0:10], "\n\n\n" )
	
	# The Unigram tagger is the weakest of the three I used, it tagged a few 
	# words as 'None'. One of the tagging errors is the word 'Headmaster', which 
	# should have a NOUN tag attached but was tagged NONE.
	
	
	
	
	
	# Tag the example text using an HMM tagger trained on 10,000 sentences from 
	# the brown corpus and print the first 10 items
	hmmTagger = nltk.hmm.HiddenMarkovModelTrainer() \
		.train_supervised(brown.tagged_sents()[:10000])
		
	print( "First 10 POS Tagged words using HMM:\n", hmmTagger.tag(t)[0:10], "\n\n\n" )
	
	# The HMM tagger was slightly stronger than the Unigram tagger, there were still
	# errors, however. For example, 'The' was tagged as AT when it should have been
	# tagged as DET(determiner).
	
	
	
	
	
	# Tag the example text using nltk-POS_TAG
	print( "First 10 POS Tagged words using nltk.POS_TAG:\n", nltk.pos_tag(t)[0:10] )
	
	# The built in tagger from nltk was a lot stronger. This is because it gets a
	# a greedy averaged perceptron tagger which is trained and tested on the Wall
	# St Journal corpus.
	
# -------------------------------------------------------------------------------



# -------------------------------------------------------------------------------
#		MAIN PROGRAM
# -------------------------------------------------------------------------------

print("\nPART1: Tokenization, Part-of-Speech Tagging (40%)\nRegistration Number: 1501801\n")

idTokens(text)
t = tokenize(text)
posTag(t)


# -------------------------------------------------------------------------------



# -------------------------------------------------------------------------------
#		END OF PART1
# -------------------------------------------------------------------------------