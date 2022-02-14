import requests
import json

# APIキーの指定
apikey = ""
# APIのひな型
page = 10
url = "https://qiita.com/api/v2/items?page=1&per_page="+ str(page) +"&query=tag%3Apython+or+tag%3Aphp+or+tag%3Aruby+or+tag%3Ahtml+or+tag%3Acss+or+tag%3ALinux+or+tag%3AGitLaby"
#https://qiita.com/api/v2/items?page=1&per_page=10&query=tag%3Apython+or+tag%3Aphp+or+tag%3Aruby+or+tag%3Ahtml+or+tag%3Acss+or+tag%3ALinux+or+tag%3AGitLaby

response = requests.get(url)
# デコード
dataList = json.loads(response.text)
for data in dataList:
    print (data["title"])
    print (data["url"])
input()
