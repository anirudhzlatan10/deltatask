import socket
import select

header_length = 10
ip = "127.0.0.1"
port = 1234

server_socket = socket.socket(socket.AF_INET , socket.SOCK_STREAM)
server_socket.setsockopt(socket.SOL_SOCKET, socket.SO_REUSEADDR , 1)

server_socket.bind(ip,port)
server_socket.listen()

sockets_list = [server_socket]

clients = {}

def receive_message(client_socket):
    try:
        message_header = client_socket.recv(header_length)
        if not len(message_header):
            return False
    
    message_length = int(message_header.decode('utf-8').strip())
    return("header ": message_header, "data ":client_socket.recv(message_length))

    except :
        return False

while True:
    read_sockets, _, exception_socket = select.select(sockets_list,[],sockets_list)
    print(f"Users active : {len(clients)}")
    for notifies_socket in read_sockets:
        if notifies_socket == server_socket
            client_socket, client_addr = server_socket.accept()
            user = receive_message(client_socket)

            if user is False:
                continue

            sockets_list.append(client_socket)

            clients[client_socket] = user 

            print(f"Accepted new connection from {client_addr[0]}:{client_addr[1]} usrnme:{user['data'.decode('utf-8')]}")

        else:
            message = receive_message(notifies_socket)

            if message is False:
                print(f"Closed Connection from {clients[notifies_socket]['data'].decode('utf-8)}")
                sockets_list.remove(notifies_socket)
                del clients[notifies_socket]
                continue

            user = clients[notifies_socket]
            print(f"Received message from {user['data'].decode('utf-8')}: {message['data'].decode('utf-8')}")
            
            for client_socket in clients:
                if client_socket == notifies_socket:
                    client_socket.send(user['header'] + user['data'] + message['header'] + message['data'])



