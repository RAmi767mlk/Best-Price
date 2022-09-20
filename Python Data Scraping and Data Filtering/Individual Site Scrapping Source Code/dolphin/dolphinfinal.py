from bs4 import BeautifulSoup
import requests
import time

# output csv file declared here
filename = "dolphinfinal.csv"

f = open(filename, 'w', encoding='utf-8-sig')

headers = "Product_Title,Price,Shop_Name,URL,Image_Url,Product_Code,Category_Id\n"

f.write(headers)


# declared the url directory and store it in a variable
# techland gpu section
def webscrapDolphin():
    source_link = requests.get('http://dolphin.computer/products?category=graphics-card').text

    # source_link = requests.get('https://www.techlandbd.com/shop-graphics-card?page=1').text
    soup = BeautifulSoup(source_link, 'lxml')

    # search element from specified url html

    body = soup.find('body')

    # here product-thumb is a css class so that i used it as a variable for better understanding

    product_thumb = body.find_all('a', class_='product-card')

    # using loop for grabing whole page data

    for product in product_thumb:

        product_name = product.find('span', class_='product-name')

        title = product_name.text.upper()

        product_price = product.find('span', class_='product-price')

        tk = product_price.text.replace(",", "").replace("Tk", "")

        link = product['href']
        
        image_url = product.find('div',class_='image-holder')

        url = image_url.img['src']

        data =title + "," + tk + "," + "DOLPHIN" + ","+ link + "," + url + "," + "1" + "," + "1" + "\n"

        f.write(data)

    time.sleep(5)

webscrapDolphin()
