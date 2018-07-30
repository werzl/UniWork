#!/usr/bin/env python
# -------------------------------------------------------------------------------
#		Q4. Text classification (40%)
# -------------------------------------------------------------------------------
# Solution to question 4 of CE314 Assignment 2 (2017)
# 
# AUTHORS
# 	Registration Number 1501801 (Adam Hewitt)
# 	Registration Number 1504270 (Jack Smith)
# 	This program is entirely our own work
#	We Used python 3.5 when testing but it should work in 2


trainingData = []
testData = []

class0Dict = {}
class1Dict = {}


# -------------------------------------------------------------------------------
#		ROUTINES
# -------------------------------------------------------------------------------
def readFiles(trainFile, testFile):
	"""
	Import the training and test files & save them into lists.

	Each line gets broken down into 3 categories
	word 0 = document id
	word 1 = class id
	word 2+ = the actual content
	"""

	# Open both files and split into lines
	with open(trainFile) as f:
		trainLines = f.read().splitlines()

	with open(testFile) as f:
		testLines = f.read().splitlines()

		
	# Extract training data
	for line in trainLines:
		line = line.split()
		
		id = line[0]
		class_id = line[1]
		words = line[2:]
		
		row = [id, class_id, words]
		
		trainingData.append(row)
		
		
	# Extract testing data
	for line in testLines:
		line = line.split()
		
		id = line[0]
		class_id = line[1]
		words = line[2:]
		
		row = [id, class_id, words]
		
		testData.append(row)
		
		
		
def priorProbabilities():
	"""
	The prior probalities are calculated by counting the total
	number of positive documents and then dividing them by the total
	number of documents in the list.
	
	Visa-Versa for Negative.

	This is done by iterating through each item in the list and incrementing
	different counters based on the class-id's stored in the list.
	"""
	total = 0.0
	pos = 0.0
	neg = 0.0

	# Count the amount of positives and negatives in the training data
	for item in trainingData:
		total += 1
		if item[1] == '0':
			pos +=1
		if item[1] == '1':
			neg +=1
			
			
	# Return the positive and negative probabilities 
	posProb = float(pos / total * 100)
	negProb = float(neg / total * 100)

	
	
	return posProb, negProb
	
	
	
def featureLikelihood():
	"""
	Feature Likelihoods work by taking the amount a word appears in a class
	and dividing by the total number of unique words across all classes to
	get an average appearance rate (per-class).

	This is done using dictionaries. Each unique word is iterated through each class 
	and then added to the dictionary with the word as the key and the feature 
	likelihood is set as the value.
	"""

	# Lists
	words = []
	finalWords = []
	posWords = []
	negWords = []
	featureListPos = []
	featureListNeg = []

	# Counters
	posCount = 0.0
	negCount = 0.0

	# Temporary Lists for formating
	featureListPosFormat = []
	featureListNegFormat = []

	# Strings
	s = "   "
	posString = ""
	negString = ""

	seen = set()

	# Add all words to words list and count positive & negative occurences
	for item in trainingData:
		for word in item[2]:
			words.append(word)
		if item[1] == '0':
			for word in item[2]:
				posWords.append(word)
				posCount += 1
		if item[1] == '1':
			for word in item[2]:
				negWords.append(word)
				negCount +=1

	# Adds all values into finalWords, skipping duplicates
	for values in words:
		if values not in seen:
			finalWords.append(values)
			seen.add(values)
			
			
			
	# Add positive and negative counts to feature list and dictionaries
	for word in finalWords:
		s += '{:12s}'.format(word)
		
		pCount = 0
		nCount = 0
		
		for row in trainingData:
			if row[1] == '0':
				if word in row[2]: pCount += 1
			if row[1] == '1':
				if word in row[2]: nCount += 1
				
		featureListPos.append((pCount + 1) / (posCount + 9))
		class0Dict[word] = ((pCount + 1) / (posCount + 9))
		
		featureListNeg.append((nCount + 1) / (negCount + 9))
		class1Dict[word] = ((nCount + 1) / (negCount + 9))

		
		
	# Formatting for the positive feature list
	for item in featureListPos:
		featureListPosFormat.append('{0:.5f}'.format(item))
		
	for item in featureListPosFormat:
		posString += '{:12s}'.format(item)

	# Formatting for the negative feature list
	for item in featureListNeg:
		featureListNegFormat.append('{0:.5f}'.format(item))
		
	for item in featureListNegFormat:
		negString += '{:12s}'.format(item)


		
	return(s, posString, negString)

	
	
def prediction():
	"""
	Using the feature extractions from earlier, we can predict the chance
	of reviews being positive or negative

	This is done by multiplying all the feature-likelihood values together for each class from each
	review. The predicted result is the value with the highest count.

	This is done by iterating through each review and then iterating through each word to get their
	feature-likelihood and depending on which prediction is higher, the result will be added to a list.

	The accuracy is calculated by comparing the true values from the test data compared to that of each value
	stored in the predicted list. if the result is correct, the accuracy is increased by 1. the final accuracy is then
	divided by the amount of items in test data * 100 (to give result as percentage).
	"""


	predictVal = []
	accuracy = 0.0

	# Calculate accuracy for each class in testData
	for item in testData:
		class0Prediction = posProb / 100
		class1Prediction = negProb / 100
		
		# Multiply the prior probablities for negative and positive reviews by their feature likelihoods  
		for word in item[2]:
			class0Prediction *= class0Dict[word]
			class1Prediction *= class1Dict[word]

		# Give every item in testData a predicted value
		if(class0Prediction > class1Prediction):
			predictVal.append('0')
		else:
			predictVal.append('1')

	for i in range(len(testData)):
		if(testData[i][1] == predictVal[i]):
			accuracy += 1

			
	accuracy = 100 * (accuracy / len(testData))
	return(predictVal, accuracy)

# -------------------------------------------------------------------------------


# -------------------------------------------------------------------------------
#		MAIN PROGRAM
# -------------------------------------------------------------------------------


readFiles("sampleTrain.txt", "sampleTest.txt")


# Prior Probablilities
print(("-"*112) + "\nPrior Probabilities")
	
posProb, negProb = priorProbabilities()
print("Class 0: " + str(posProb) + "%")
print("Class 1: " + str(negProb) + "%")




# Feature Likelihoods
print("-"*112)

print("\nFeature Likelihoods (You may have to extend shell window for table to fit in frame)")
s, posString, negString = featureLikelihood()
print("      " + s + "\nClass 0  " + str(posString) + "\nClass 1  " + str(negString))




# Predictions on Test Data
predictVal, accuracy = prediction()

print("-"*112 + "\nPredictions on test data")

print("\nd5 = " + str(predictVal[0]))
print("d6 = " + str(predictVal[1]))
print("d7 = " + str(predictVal[2]))
print("d8 = " + str(predictVal[3]))
print("d9 = " + str(predictVal[4]))
print("d10 = " + str(predictVal[5]))

print("\nAccuracy on test data = " + str(accuracy) + "%\n")

print("-"*112)
	
# -------------------------------------------------------------------------------


# -------------------------------------------------------------------------------
#		END OF NAIVEBAYES.PY
# -------------------------------------------------------------------------------
