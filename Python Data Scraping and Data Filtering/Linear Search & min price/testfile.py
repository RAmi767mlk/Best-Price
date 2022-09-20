from bs4 import BeautifulSoup
import requests
import time
import csv   
import pandas as pd
import pysolr 


def searchOne():

    filename = "sOne.csv"

    f = open(filename, 'w', encoding='utf-8-sig')

    headers = "Product_Title,Price,Shop,Category_Id\n"

    f.write(headers)

    f1 = open("data.csv", "r")


    info =  input("Enter The Key Word: ").upper()

    

    l = f1.readlines()

    for i in l:
        l2 = i
        if info in l2:
            data = (i)
            print(data)

            f.write(data)


def searchTwo():

    filename = "sTwo.csv"

    f = open(filename, 'w', encoding='utf-8-sig')

    headers = "Product_Title,Price,Shop,Category_Id\n"

    f.write(headers)

    f1 = open("sOne.csv", "r")


    info =  input("Enter The Key Word: ").upper()

    l = f1.readlines()

    for i in l:
        l2 = i
        if info in l2:
            data = (i)
            print(data)

            f.write(data)

def searchThree():

    filename = "sThree.csv"

    f = open(filename, 'w', encoding='utf-8-sig')

    headers = "Product_Title,Price,Shop,Category_Id\n"

    f.write(headers)

    f1 = open("sTwo.csv", "r")


    info =  input("Enter The Key Word: ").upper()

    l = f1.readlines()

    for i in l:
        l2 = i
        if info in l2:
            data = (i)
            print(data)

            f.write(data)


def searchFour():

    filename = "sFour.csv"

    f = open(filename, 'w', encoding='utf-8-sig')

    headers = "Product_Title,Price,Shop,Category_Id\n"

    f.write(headers)

    f1 = open("sThree.csv", "r")


    info =  input("Enter The Key Word: ").upper()

    l = f1.readlines()

    for i in l:
        l2 = i
        if info in l2:
            data = (i)
            print(data)

            f.write(data)

def searchFinal():

    filename = "final.csv"

    f = open(filename, 'w', encoding='utf-8-sig')

    headers = "Product_Title,Price,Shop,Category_Id\n"

    f.write(headers)

    f1 = open("sFour.csv", "r")


    info =  input("Enter The Key Word: ").upper()

    l = f1.readlines()

    for i in l:
        l2 = i
        if info in l2:
            data = (i)
            print(data)

            f.write(data)





# headers = "Product_Title,Price,Shop,Category_Id\n"

# f5.write(headers)


def minPrice():

    filename = "minPrice.csv"

    f5 = open(filename,'w',encoding='utf-8')
    
    headers = "Product_Title,Price,Shop,Category_Id,product_code\n"

    f5.write(headers)

    df=pd.read_csv('final.csv')


    #FINDING MAX AND MIN
    # p=df[' Price '].max()
    q=df['Price'].min()

    print('minimum price is: ' + str(q))

    f = open("final.csv","r")
    info =  str(q)

    l = f.readlines()

    for i in l:
        if info in i:
            print(i)
            f5.write(i + "," + "1")

            # csv_input = pd.read_csv('minPrice.csv')
            # csv_input['Product_Code'] = csv_input['Name']
            # csv_input.to_csv('mini.csv', index = False)
        

            # field= [i]
            # with open(r'finalMinPrice.csv', 'a') as f:
            #     writer = csv.writer(f)
            #     writer.writerow(field)
            #     f.close()


searchOne()

searchTwo()

searchThree()

searchFour()

searchFinal()

minPrice()




