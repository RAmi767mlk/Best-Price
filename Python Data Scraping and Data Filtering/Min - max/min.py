import pandas as pd

df=pd.read_csv('productss.csv')


#FINDING MAX AND MIN
p=df[' Price '].max()
q=df[' Price '].min()


print(q)
print(p)




