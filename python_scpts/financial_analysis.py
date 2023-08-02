import mysql.connector

def financial_analysis(user_id):
    
    conn = mysql.connector.connect(
        host="localhost",
        user="seu_usuario",
        password="sua_senha",
        database="financial_app_db"
    )
    cursor = conn.cursor()


    query = f"SELECT * FROM transactions WHERE user_id = {user_id}"
    cursor.execute(query)
    transactions = cursor.fetchall()


    total_amount = sum(transaction[3] for transaction in transactions)
    average_amount = total_amount / len(transactions)

   
    print(f"Análise Financeira para o Usuário ID {user_id}:")
    print(f"Total de Transações: {len(transactions)}")
    print(f"Total Gasto: R$ {total_amount:.2f}")
    print(f"Média de Gasto: R$ {average_amount:.2f}")

  
    cursor.close()
    conn.close()

if __name__ == '__main__':
    user_id = int(input("Digite o ID do Usuário para a Análise Financeira: "))
    financial_analysis(user_id)
