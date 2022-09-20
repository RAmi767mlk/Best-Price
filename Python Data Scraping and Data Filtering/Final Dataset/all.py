
from bs4 import BeautifulSoup
import requests
import time
import threading

# output csv file declared here
filename = "Graphics_Card.csv"

f = open(filename, 'w', encoding='utf-8-sig')

headers = "Product_Title,Price,Shop,Category_Id\n"

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

            data = (title + "," + tk + "," + "BD STALL" + "," + "1" + "\n")

            f.write(data)

        time.sleep(5)



def webscrapCvillage():

    pages = [1,2,3,4,5]

    # declared the url directory and store it in a variable
    # techland gpu section
    for page in pages:
        source_link = requests.get('https://www.village-bd.com/graphics-card/{}'.format(page)).text

        soup = BeautifulSoup(source_link,'lxml')


        # search element from specified url html

        body = soup.find('body')

        # here product-thumb is a css class so that i used it as a variable for better understanding

        productInfo = body.find_all('div',class_='info-box')


        # using loop for grabing whole page data

        for product in productInfo:


            product_name = product.find ('div',class_='pro-name')

            title = product_name.a.text.upper()

            product_price = product.find('div',class_='price')

            tk = product_price.text.replace(",","").replace("৳","")
            
            data = title + "," + tk + "," + "COMPUTER VILLAGE" + "," + "1" + "\n"

            f.write(data)

        time.sleep(5)



def webscrapDolphin():
    source_link = requests.get('http://dolphin.computer/products?category=graphics-card').text

    # source_link = requests.get('https://www.techlandbd.com/shop-graphics-card?page=1').text
    soup = BeautifulSoup(source_link, 'lxml')

    # search element from specified url html

    body = soup.find('body')

    # here product-thumb is a css class so that i used it as a variable for better understanding

    product_thumb = body.find_all('div', class_='product-card-inner')

    # using loop for grabing whole page data

    for product in product_thumb:

        product_name = product.find('span', class_='product-name')

        title = product_name.text.upper()

        product_price = product.find('span', class_='product-price')

        tk = product_price.text.replace(",", "").replace("Tk", "")

        data = (title + "," + tk + "," + "DOLPHIN COMPUTERS" + "," + "1" + "\n")

        f.write(data)

    time.sleep(5)



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
        # time.sleep(0.5)



def webscrapStartech():
    pages = [1,2,3,4,5]

    # declared the url directory and store it in a variable
    # techland gpu section
    for page in pages:
        source_link = requests.get('https://www.startech.com.bd/component/graphics-card?page={}'.format(page)).text

        soup = BeautifulSoup(source_link, 'lxml')

        # search element from specified url html

        body = soup.find('body')

        # here product-thumb is a css class so that i used it as a variable for better understanding

        productInfo = body.find_all('div', class_='col-xs-12 col-md-4 product-layout grid')

        # using loop for grabing whole page data

        for product in productInfo:

            product_name = product.find('h4', class_='product-name')

            title = product_name.a.text.upper()

            product_price = product.find('div', class_='price space-between')

            tk = product_price.span.text.replace(",","").replace("৳","")

            # int(tk)

            data = title + "," + tk + "," + "STARTECH" + "," + "1" + "\n"

            f.write(data)
        time.sleep(5)


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

        product_thumb = body.find_all('div', class_='product-thumb')

        # using loop for grabing whole page data

        for product in product_thumb:

            product_name = product.find('div', class_='name')

            title = product_name.a.text.upper()

            product_price = product.find('div', class_='price')

            tk = product_price.span.text

            data = (title + "," + tk.replace("৳","").replace(",","") + "," + "TECHLAND" + "," + "1"+"\n")

            f.write(data)

        time.sleep(5)



threading.Thread(target = webscrapBdstall).start()

threading.Thread(target = webscrapCvillage).start()

threading.Thread(target = webscrapDolphin).start()
    
threading.Thread(target = webscrapRyans).start()

threading.Thread(target = webscrapStartech).start()
    
threading.Thread(target = webscrapTechland).start()

