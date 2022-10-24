import mysql.connector

def getConn():
    return mysql.connector.connect(
        host="localhost",
        user="root",
        passwd="",
        database="selenium"
    )
    
def getCursor(conn):
    return conn.cursor()

def close_connection(conn):
    conn.close()
    
def close_cursor(cursor):
    cursor.close()
    
def insert_data(conn, cursor, table, data):
    sql = "INSERT INTO " + table + " (nome, codigo, v_atual, v_min, v_max, valorizacao) VALUES (%s, %s, %s, %s, %s, %s)"
    cursor.execute(sql, data)
    conn.commit()
    
def update_data(conn, cursor, table, data):
    sql = "UPDATE " + table + " SET v_atual = %s, v_min = %s, v_max = %s, valorizacao = %s WHERE codigo = %s"
    cursor.execute(sql, data)
    conn.commit()
    
def isset(cursor, table, data):
    sql = "SELECT * FROM " + table + " WHERE codigo = %s"
    cursor.execute(sql, data)
    result = cursor.fetchall()
    if len(result) > 0:
        return True
    else:
        return False