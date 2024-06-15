import json
import mysql.connector
import time
import logging
import pandas as pd
from nltk.sentiment.vader import SentimentIntensityAnalyzer

# Configuration
DB_CONFIG = {
    'user': 'root',
    'password': '',
    'host': 'localhost',
    'database': 'feedback'
}
POSITIVE_THRESHOLD = 0.05
NEGATIVE_THRESHOLD = -0.05
SLEEP_INTERVAL = 30  # Sleep for 30 seconds

# Setup logging
logging.basicConfig(level=logging.INFO, format='%(asctime)s - %(levelname)s - %(message)s')

def establish_database_connection():
    """Establishes connection to the MySQL database."""
    try:
        cnx = mysql.connector.connect(**DB_CONFIG)
        return cnx
    except mysql.connector.Error as err:
        logging.error(f"Error connecting to the database: {err}")
        return None

def close_database_connection(cnx):
    """Closes the database connection."""
    if cnx:
        cnx.close()

def load_hiligaynon_sentiment_data(filepath):
    """Loads Hiligaynon sentiment data from an Excel file."""
    df = pd.read_excel(filepath)
    return dict(zip(df['words'], df['sentiment']))

def analyze_sentiment(text, hiligaynon_sentiments, analyzer):
    """Analyzes the sentiment of a given text."""
    words = text.split()
    sentiment_score = 0
    for word in words:
        if word in hiligaynon_sentiments:
            sentiment_score += hiligaynon_sentiments[word]
        else:
            sentiment_score += analyzer.polarity_scores(word)['compound']
    
    return sentiment_score / len(words) if words else 0

def generate_sentiment_data(hiligaynon_sentiments):
    """Generates sentiment data for each school year and semester."""
    cnx = establish_database_connection()
    if not cnx:
        return
    
    try:
        cursor = cnx.cursor()

        cursor.execute("SELECT DISTINCT school_year, semester FROM adfeed")
        year_semester_combinations = cursor.fetchall()

        analyzer = SentimentIntensityAnalyzer()
        sentiment_results = []

        for year, semester in year_semester_combinations:
            query = "SELECT message FROM adfeed WHERE school_year=%s AND semester=%s"
            cursor.execute(query, (year, semester))
            rows = cursor.fetchall()

            sentiment_data = {'school_year': year, 'semester': semester, 'sentiment': {'positive': 0, 'negative': 0, 'neutral': 0}}

            for row in rows:
                text = row[0]
                compound_score = analyze_sentiment(text, hiligaynon_sentiments, analyzer)

                if compound_score >= POSITIVE_THRESHOLD:
                    sentiment_data['sentiment']['positive'] += 1
                elif compound_score <= NEGATIVE_THRESHOLD:
                    sentiment_data['sentiment']['negative'] += 1
                else:
                    sentiment_data['sentiment']['neutral'] += 1

            total = sum(sentiment_data['sentiment'].values())
            for sentiment, count in sentiment_data['sentiment'].items():
                sentiment_data['sentiment'][sentiment] = count / total * 100 if total != 0 else 0

            sentiment_results.append(sentiment_data)

        with open('admin_sentiment_data_yearly.json', 'w') as json_file:
            json.dump(sentiment_results, json_file)
        logging.info("Generated yearly sentiment data successfully.")
    
    except mysql.connector.Error as err:
        logging.error(f"Error executing MySQL query: {err}")
    
    finally:
        close_database_connection(cnx)

def generate_sentiment_data_simple(hiligaynon_sentiments):
    """Generates overall sentiment data."""
    cnx = establish_database_connection()
    if not cnx:
        return
    
    try:
        cursor = cnx.cursor()

        query = "SELECT message FROM adfeed"
        cursor.execute(query)
        rows = cursor.fetchall()

        analyzer = SentimentIntensityAnalyzer()
        sentiment_data = {'positive': 0, 'negative': 0, 'neutral': 0}

        for row in rows:
            text = row[0]
            compound_score = analyze_sentiment(text, hiligaynon_sentiments, analyzer)

            if compound_score >= POSITIVE_THRESHOLD:
                sentiment_data['positive'] += 1
            elif compound_score <= NEGATIVE_THRESHOLD:
                sentiment_data['negative'] += 1
            else:
                sentiment_data['neutral'] += 1

        sentiment_data['overall_counts'] = sum(sentiment_data.values())

        with open('admin_sentiment_data_counts.json', 'w') as json_file:
            json.dump({'sentiment': sentiment_data}, json_file)
        logging.info("Generated overall sentiment data successfully.")
    
    except mysql.connector.Error as err:
        logging.error(f"Error executing MySQL query: {err}")
    
    finally:
        close_database_connection(cnx)

if __name__ == "__main__":
    hiligaynon_sentiments = load_hiligaynon_sentiment_data('hiligaynon.xlsx')
    while True:
        generate_sentiment_data(hiligaynon_sentiments)
        generate_sentiment_data_simple(hiligaynon_sentiments)
        time.sleep(SLEEP_INTERVAL)
