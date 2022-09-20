from bs4 import BeautifulSoup
import requests
import time

# output csv file declared here
filename = "techlandfinal.csv"

f = open(filename, 'w', encoding='utf-8')

headers = "Product_Title,Price,Shop_Name,URL,Image_Url,Product_Code,Category_Id\n"

f.write(headers)

def webscrapTechland():

    pages = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15]

    # declared the url directory and store it in a variable
    # techland gpu section
    for page in pages:
        source_link = requests.get('https://www.techlandbd.com/shop-graphics-card?page={}'.format(page)).text

        # source_link = requests.get('https://www.techlandbd.com/shop-graphics-card?page=1').text
        soup = BeautifulSoup(source_link, 'lxml')

        # search element from specified url html

        body = soup.find('body')

        # here product-thumb is a css class so that i used it as a variable for better understanding

        product_thumb = soup.find_all('div', class_='product-thumb')

        # using loop for grabing whole page data

        for product in product_thumb:

            product_name = product.find('div', class_='name')

            title = product_name.a.text.strip()

            product_price = product.find('div', class_='price')

            tk = product_price.span.text

            product_link = product.find('div', class_='name')

            link = product_link.a['href']

            image_url = product.find('a', class_='product-img')

            url = image_url.img['src']



            data = (title + "," + tk.replace("৳","").replace(",","") + "," + "TECHLAND" + ","+ link +"," + url + "," + "1" + ","+ "1"+"\n")

            f.write(data)

        time.sleep(5)


webscrapTechland()
