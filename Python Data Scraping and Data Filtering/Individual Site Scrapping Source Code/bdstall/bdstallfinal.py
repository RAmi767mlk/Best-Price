from bs4 import BeautifulSoup
import requests
import time

# output csv file declared here
filename = "bdstallfinal.csv"

f = open(filename, 'w', encoding='utf-8-sig')

headers = "Product_Title,Price,Shop_Name,URL,Image_Url,Product_Code,Category_Id\n"

f.write(headers)


def webscrapBdstall():
    pages = [1,2]

    # declared the url directory and store it in a variable
    # techland gpu section
    for page in pages:
        source_link = requests.get('https://www.bdstall.com/graphics-card/{}'.format(page)).text

        # source_link = requests.get('https://www.techlandbd.com/shop-graphics-card?page=1').text
        soup = BeautifulSoup(source_link, 'lxml')

        # search element from specified url html

        body = soup.find('body')

        # here product-thumb is a css class so that i used it as a variable for better understanding

        product_thumb = body.find_all('div', class_='row product-cat-box s-top')

        # using loop for grabing whole page data

        for product in product_thumb:

            product_name = product.find(
                'div', class_='six columns product-cat-box-text')

            title = product_name.a.text.upper()

            product_price = product.find('div', class_='product-price')

            tk = product_price.text.replace(",","").replace("৳","")

            product_link = product.find('div',class_='six columns product-cat-box-text')
            
            link = product_link.a['href']

            image_url = product.find('div', class_='seven columns')

            url = image_url.img['src']

            data =title + "," + tk + "," + "BDSTALL" + ","+ link + "," + url + "," + "1" + "," + "1" + "\n"

            f.write(data)

        time.sleep(5)

webscrapBdstall()
