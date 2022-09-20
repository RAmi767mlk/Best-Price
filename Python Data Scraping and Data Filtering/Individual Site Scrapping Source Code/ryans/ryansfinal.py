from bs4 import BeautifulSoup
import requests
import time

# output csv file declared here
filename = "ryansfinal.csv"

f = open(filename, "w", encoding='utf-8-sig')

headers = "Product_Title,Price,Shop_Name,URL,Image_Url,Product_Code,Category_Id\n"

f.write(headers)

# declared the url directory and store it in a variable
# techland gpu section
def webscrapRyans():

    pages = [1,2,3,4,5,6,7]
    for page in pages:
        source_link = requests.get(
            'https://ryanscomputers.com/grid/desktop-component-graphics-card?page={}'.format(page)).text

        soup = BeautifulSoup(source_link, 'lxml')

        # search element from specified url html

        body = soup.find('body')

        # here product-thumb is a css class so that i used it as a variable for better understanding

        product_info = body.find_all('div', class_='product-box')

        # using loop for grabing whole page data

        for product in product_info:

            product_name = product.find('div', class_='product-content-info')

            title = product_name.a.text.replace(",","").upper()

            product_price = product.find('span', class_='price')

            tk = product_price.text.replace("Tk","").replace(",","").replace("BDT","").strip()

            product_link = product.find('div', class_='product-content-info')

            link = product_link.a['href']

            image_url = product.find('div', class_='product-thumb')
            url = image_url.img['src']

            data =title + "," + tk + "," + "RYANS" + ","+ link + "," + url + "," + "1" + "," + "1" + "\n"

            f.write(data)
        time.sleep(5)

webscrapRyans()
