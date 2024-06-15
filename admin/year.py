import json
import mysql.connector
import sys
from nltk.sentiment.vader import SentimentIntensityAnalyzer
import time

# Print Python interpreter
print(sys.executable)

while True:
    try:
        # Establish MySQL connection
        cnx = mysql.connector.connect(user='root', password='', host='localhost', database='feedback')
        cursor = cnx.cursor()

        # Fetch distinct combinations of school year and semester
        cursor.execute("SELECT DISTINCT school_year, semester FROM adfeed")
        year_semester_combinations = cursor.fetchall()

        # Initialize SentimentIntensityAnalyzer
        analyzer = SentimentIntensityAnalyzer()

        sentiment_results = []

        for year, semester in year_semester_combinations:
            # Construct SQL query for each combination
            query = f"SELECT message FROM adfeed WHERE school_year='{year}' AND semester='{semester}'"
            cursor.execute(query)
            rows = cursor.fetchall()

            sentiment_data = {'school_year': year, 'semester': semester, 'sentiment': {'positive': 0, 'negative': 0, 'neutral': 0}}

            for row in rows:
                text = row[0]
                scores = analyzer.polarity_scores(text)
                compound_score = scores['compound']

                # Determine sentiment based on compound score
                if compound_score >= 0.05:
                    sentiment_data['sentiment']['positive'] += 1
                elif compound_score <= -0.05:
                    sentiment_data['sentiment']['negative'] += 1
                else:
                    sentiment_data['sentiment']['neutral'] += 1

            # Calculate percentages
            total = sum(sentiment_data['sentiment'].values())
            for sentiment, count in sentiment_data['sentiment'].items():
                sentiment_data['sentiment'][sentiment] = count / total * 100 if total != 0 else 0

            sentiment_results.append(sentiment_data)

        # Output sentiment data to a JSON file
        with open('sentiment_data.json', 'w') as json_file:
            json.dump(sentiment_results, json_file)

    except mysql.connector.Error as err:
        print(f"Error: {err}")

    finally:
        # Close cursor and connection
        if cursor:
            cursor.close()
        if cnx:
            cnx.close()

    # Wait for some time before running the script again
    time.sleep(300)  # Sleep for 5 minutes before running again
