import time , socket , sys
print('Setting-up Server...')

soc = socket.socket()
host_name = socket.gethostname()
ip = socket.gethostbyname(host_name)
port = 1234
soc.bind((host_name,port))
print(host_name,'({})'.format(ip))
name = input('Enter Name: ')
soc.listen(1)
current_users = {}

print('Waiting for incoming connection...')
connection.addr = soc.accept()
print('Recieved Connection from'.addr[0].'('.addr[1].')\n')
print('Connecton Established.\nConnected From : {}, ({})'.format(addr[0],addr[0]))

client_name = connection.recv(1024)
client_name = client_name.decode()
current_users.extend(client_name)
print(client_name + ' has connected ')
print('Enter [bye] to leave the chatroom ')
connection.send(name.encode())

while True:
    no_of_users = len(current_users)
    print(f"Users online : {no_of_users}")
    message = input('Me > ')
    if message=='bye':
        message = 'Good bye.....'
        current_users.remove(client_name)
        connection.send(message.encode())
        print("\n")
        break
    connection.send(message.encode())

    message = connection.recv(1024)
    message = message.decode()
    print(client_name, ' > ', message)

