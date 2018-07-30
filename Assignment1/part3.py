#!/usr/bin/env python
# -------------------------------------------------------------------------------
#		PART3: Write your own version of ELIZA (30%)
# -------------------------------------------------------------------------------
# Solution to part 3 of CE314 Assignment 1 (2017)
# 
# AUTHOR
# 	Registration Number 1501801
# 	This program is entirely my own work

from nltk import re
import random


# A sequence by which each element contains a regular expression and possible 
# responses to the user
patternsAndResponses = [

	# Example Entry
	# [
	# Regular expression,
	# [Response 1
	# Response 2
	# Response 3]
	# ]
	
	[ # Greetings
	'(hello|hi)',
	["Hello.",
	"Hi. How are you?"]
	],
	
	
	[ # Months
	'.*?(paris|berlin) (on|in|next) (((.*) ?(.*)?)|(january|february|march|april|may|june'\
		'|july|august|september|october|november|december))', 
	["We apologize, but all our services to {0} {1} {2} have been cancelled.",
	"We are sorry, but all our flights {1} {2} to {0} are fully booked.", 
	"There are no available flights {1} {2} to {0}. Please accept our apologies."]
	],
	
	
	[ # Days
	'.*?(monday|tuesday|wednesday|thursday|friday)', 
	["We apologize, but all our services on {0} have been cancelled.",
	"We are sorry, but all our {0} flights are fully booked.", 
	"There are no available flights this {0}. Please accept our apologies."]
	],
	

	[ # paris/berlin today/tomorrow
	
	'.*?(paris|berlin) (tomorrow|today)',
	["We apologize, but all our services to {0} {1} have been cancelled.",
	"We are sorry, but all our {0} flights are fully booked {1}.", 
	"There are no available {0} flights {1}. Please accept our apologies."] 
	
	],
	
	
	[ # today/tomorrow paris/berlin 
	
	'.*?(tomorrow|today) .*?(paris|berlin)',
	["We apologize, but all our services to {1} {0} have been cancelled.",
	"We are sorry, but all our {1} flights are fully booked {0}.", 
	"There are no available {1} flights {0}. Please accept our apologies."] 
	
	],
	
	
	[ # paris/berlin
	
	'.*?(paris|berlin)',
	["When do you want to fly to {0}?"]
	
	],
	
	
	[ # in/on/next to paris/berlin
	
	'.*?(on|in|next) (.*?) to (paris|berlin)',
	["We apologize, but all our services to {2} {0} {1} have been cancelled.",
	"We are sorry, but all our {2} flights are fully booked {0} {1}.",
	"There are no available {2} flights {0} {1}. Please accept our apologies."]
	],
	
	
	[# fly to somewhere other than paris/berlin
	'.*?to (.*)',
	["We only offer flights to Paris or Berlin, not {0}."]
	],
	
	
	[ # exit program message
	
	'e',
	["Goodbye..."]
	],
	
	
	[ # input isn't recognised by any other re's
	
	'(.*?)',
	["I'm sorry, I don't understand.",
	"Thats Interesting...",
	"What does that have to do with booking flights?"]
	]
	
]



# -------------------------------------------------------------------------------
#		ROUTINES
# -------------------------------------------------------------------------------

def respond(uIn):
	"""Compare user input string to regular expressions and produce a response"""
	uIn = uIn.strip(".,'!?-")

	# Iterate through each element of patterns sequence, search for a match
	for regex, choices in patternsAndResponses:
		result = re.match( regex, uIn, re.IGNORECASE )
		
		# If a match is found, return a string with a random response unpacked
		# from patternsAndResponses
		if result:
			r = random.randint(0, len(choices)-1)
			answer = choices[r]
			
			return answer.format( *[m for m in result.groups()] )
			
			
# -------------------------------------------------------------------------------
			
			
			
# -------------------------------------------------------------------------------
#		MAIN PROGRAM
# -------------------------------------------------------------------------------

print("\nPART3: Write your own version of ELIZA (30%)\nRegistration Number: 1501801\n")
print("Ask ELIZA about flights from Paris to Berlin(Enter 'e' to exit)")
print("ELIZA: Hello, I am Eliza.")

running = True
while running:
	
	uIn = input("User: ")
		
	if (uIn == "e"): running = False
		
	print("ELIZA:", respond(uIn))

# -------------------------------------------------------------------------------


	
# -------------------------------------------------------------------------------
#		END OF PART3
# -------------------------------------------------------------------------------