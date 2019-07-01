import time,socket,sys
print('Client Server...')

soc = socket.socket()
shost = socket.gethostname()
ip = socket.gethostbyname(short)

print(shost, '({})'.format(ip))
server_host = input('Enter server\'s IP address : ' )
name = input('Enter Username :')
port =1234
print('Trying to connect to the server: []')

soc.connect((server_host , port))
print('Connected......')
soc.send(name.encode())
server_name = soc.recv(1024)
server_name = server_name.decode()
print('{} has joined ... '.format(server_name))
print('Enter [bye] to exit')

while True:
    message = soc.recv(1024)
    message = message.decode()
    print(server_name,' > ', message)
    message = input(str("Me > "))
    if message == "bye" :
        message= "Leaving chat room ......"
        soc.send(message.encode())
        print('\n')
        break
    soc.send(message.encode())
 
