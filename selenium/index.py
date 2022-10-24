from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
import conn as c

fiis = [
    'MXRF11',
    'HGLG11',
    'IRDM11',
    'CPTS11',
    'VINO11',
    'XPPR11',
    'HGRE11',
    'RECR11',
    'TORD11',
    'CARE11'
]

browser = webdriver.Chrome()
url = 'https://www.fundsexplorer.com.br/funds/'

for fii in fiis:
    browser.get(url + fii)
    data = (
            browser.find_element(By.CLASS_NAME, "section-subtitle").text,
            fii, 
            browser.find_element(By.CLASS_NAME, "price").text, 
            browser.find_element(By.ID, "min-52").text, 
            browser.find_element(By.ID, "max-52").text, 
            browser.find_element(By.ID, "variation-12-months").text
        )
    
    conn = c.getConn()
    cursor = c.getCursor(conn)
    
    if c.isset(cursor, 'fiis', (fii,)):
        data = (data[2], data[3], data[4], data[5], fii)
        c.update_data(conn, cursor, 'fiis', data)
    else:
        c.insert_data(conn, cursor, 'fiis', data)
        
c.close_cursor(cursor)
c.close_connection(conn)
