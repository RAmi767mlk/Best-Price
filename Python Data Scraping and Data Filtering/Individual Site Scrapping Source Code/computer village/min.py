import pandas as pd
import requests
import time

df=pd.read_csv('productss.csv')


#FINDING MAX AND MIN
p=df[' Price '].max()
q=df[' Price '].min()


print(q)
print(p)



