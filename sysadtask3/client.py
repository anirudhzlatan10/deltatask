import socket
import select
import sys

header_length = 10
ip = "127.0.0.1"
port = 1234

my_username = input("Username :")
client_socket = socket.socket(socket.AF_INET , socket.SOCK_STREAM)
client_socket.connetct((ip, port))
client_socket.setblocking(false)

Username = my_username.encode('utf-8')
Username_header = f"{len(Username):<{header_length}}".encode("utf-8")

client_socket.send(Username_header + Username)

while True:
    message = input(f"ME > ")
    if message:
        message = message.encode("utf-8")
        message_header = f"{len(message):<{header_length}}".encode("utf-8")
        client_socket.send(message_header + message)
    
  
    while True:
        #recieve Thing
        Username_header = client_socket.recv(header_length)
        if not len(Username_header):
            print("Connection Closed....")
            sys.exit()
            
        Username_length = int(Username_length.decode("utf-8").strip())
        Username = client_socket.recv(Username_length).decode("utf-8")

        message_header = client_socket.recv(header_length)
        message_length = int(message_header.decode("utf-8").strip())
        message = client_socket.recv(message_length).decode("utf-8")

        print(f"{Username} > {message}")
