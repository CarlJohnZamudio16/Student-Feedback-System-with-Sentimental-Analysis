import pandas as pd

# Example Hiligaynon sentiment data
data = {
    'Word': [
        'maayo', 'malain', 'kalipay', 'kasubo', 'maayo gid', 'way pulos', 'palangga', 'sakit',
        'balaan', 'gahum', 'dasig', 'gid', 'halin', 'hilway', 'kabuhi', 'kagamo', 'kahilwayan', 
        'kaigo', 'kalipay gid', 'kanami', 'kanubo', 'kasadyahan', 'katuyuan', 'kaya', 'libog',
        'lubong', 'luya', 'maambong', 'madamo', 'madinalag-on', 'madinalag-on gid', 'magul-anon', 
        'malapit', 'manami', 'manginbulahon', 'mapainubuson', 'mapigaw', 'mapisan', 'masamig', 
        'masami', 'matinlo', 'mawasay', 'medyo', 'nagakaigo', 'nami', 'namit', 'nasulbad', 'paglaum', 
        'pait', 'pangduro', 'panginbulahan', 'pasalig', 'patay', 'putli', 'sa sunod', 'salamat', 
        'santu', 'sapak', 'sigurado', 'silak', 'sulat', 'sulul', 'sululon', 'sumbong', 'sunlog', 
        'supog', 'suya', 'taas', 'tagipusuon', 'tama', 'tamis', 'tanum', 'tiunay', 'tinuod', 
        'tiyak', 'tungod', 'tuytoy', 'ulipon', 'ulul', 'winasak', 'yuhom', 'bug-at', 'sangko', 
        'hagbay', 'labing maayo', 'daku', 'kugma', 'kasal', 'kalinong', 'taga', 'buot', 'kamatuoran',
        'gugma', 'kadungan', 'kadunganan', 'kapintasan', 'kapintas', 'lapit', 'sa likod', 'sa ubos',
        'wala', 'way pili', 'buot gid', 'gugma gid', 'mahal'
    ],
    'Sentiment': [
        0.7, -0.7, 0.6, -0.6, 0.8, -0.8, 0.9, -0.9, 0.5, -0.5, 0.6, 0.3, 0.4, 0.5, 0.7, -0.4, 0.5,
        0.4, 0.8, 0.7, -0.3, 0.8, 0.6, 0.7, -0.6, -0.4, 0.6, 0.6, 0.7, 0.8, 0.9, -0.5, 0.4, 0.6,
        0.7, 0.8, -0.3, 0.6, -0.2, -0.3, 0.7, 0.5, 0.4, 0.7, 0.8, 0.8, 0.7, 0.9, -0.8, -0.4, 0.9,
        0.8, -0.9, 0.9, 0.5, 0.6, 0.9, -0.6, 0.8, 0.5, -0.7, -0.5, 0.4, -0.4, -0.5, -0.6, 0.7, 0.9,
        0.6, 0.6, 0.9, 0.8, 0.7, 0.6, 0.5, 0.6, 0.4, -0.5, 0.5, -0.6, -0.5, -0.8, 0.6, -0.6, 0.5,
        0.7, 0.9, 0.6, 0.8, 0.9, 0.8, 0.6, 0.8, 0.7, 0.9, 0.8, -0.7, -0.6, -0.4, -0.5, 0.8, 0.7, 0.6
    ]
}

# Ensure both arrays have the same length
min_length = min(len(data['Word']), len(data['Sentiment']))
data['Word'] = data['Word'][:min_length]
data['Sentiment'] = data['Sentiment'][:min_length]

# Create DataFrame
df = pd.DataFrame(data)

# Save to Excel file
df.to_excel('hiligaynon_sentiment.xlsx', index=False)

print("Hiligaynon sentiment data saved to 'hiligaynon_sentiment.xlsx'")
