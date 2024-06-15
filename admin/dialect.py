import pandas as pd
from nltk.sentiment.vader import SentimentIntensityAnalyzer
import re

# Load the data
df = pd.read_excel('Hiligaynon Word Sentiments Full.xlsx')

# Function to remove special characters from a word
def clean_word(word):
    return re.sub(r'[^a-zA-Z0-9\s]', '', word)

# Apply the clean_word function to the 'word' column
df['word'] = df['word'].apply(clean_word)

# Create a dictionary mapping cleaned Hiligaynon words to sentiment labels
sentiment_dict = dict(zip(df['word'], df['sentiment']))

# Initialize Sentiment Intensity Analyzer
analyzer = SentimentIntensityAnalyzer()

# Example sentiment analysis function
def analyze_sentiment(text):
    sentiment_label = sentiment_dict.get(text, 'neutral')
    
    if sentiment_label == 'positive':
        return 1
    elif sentiment_label == 'negative':
        return -1
    else:
        # Handle neutral sentiment
        return 0

# Example usage
hiligaynon_word = "báboy"
sentiment_score = analyze_sentiment(hiligaynon_word)
print(f"The sentiment score for '{hiligaynon_word}' is: {sentiment_score}")
