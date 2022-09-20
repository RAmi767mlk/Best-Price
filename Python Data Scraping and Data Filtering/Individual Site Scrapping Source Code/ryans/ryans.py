from bs4 import BeautifulSoup
import requests
import time

# output csv file declared here
filename = "ryans.csv"

f = open(filename, "w", encoding='utf-8-sig')

headers = "Product_Title,Price,Shop,Category_Id\n"

f.write(headers)

# declared the url directory and store it in a variable
# techland gpu section
def webscrapRyans():
    source_link = requests.get(
        'https://ryanscomputers.com/components/graphics-card.html?limit=288').text

    soup = BeautifulSoup(source_link, 'lxml')

    # search element from specified url html

    body = soup.find('body')

    # here product-thumb is a css class so that i used it as a variable for better understanding

    product_info = body.find_all('div', class_='box-info')

    # using loop for grabing whole page data

    for product in product_info:

        product_name = product.find('h2', class_='product-name')

        title = product_name.a.text.replace(",","").upper()

        product_price = product.find('span', class_='price')

        tk = product_price.text.replace("Tk","").replace(",","").strip()

        data =title + "," + tk + "," + "RYANS" + "," + "1" + "\n"

        f.write(data)
        time.sleep(0.5)

webscrapRyans()
