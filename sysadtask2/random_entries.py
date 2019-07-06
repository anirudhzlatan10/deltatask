import requests
import random
import webbrowser

cpu = random.randint(1,100)
mem = random.randint(10,100000)
treq = random.randint(60,3600)

url = "http://192.168.43.159/Cern_Server.php"
values = {}
values['CPURequired'] = cpu
values['MemoryRequired'] = mem
values['TimeRequired'] = treq

r = requests.post(url,values)
with open("loadbalancer.html", "wb") as w:
    w.write(r.content)
webbrowser.open("loadbalancer.html")
