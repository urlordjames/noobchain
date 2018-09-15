import requests
import random
import hashlib
numhash = requests.get("https://urlordjames.ga/noobchain/guesses.bc").text
guess = 0
guesshash = ""
print(numhash)
message = input("message to send\n")
while not numhash == guesshash:
    guess = random.randint(0, 1000000)
    guesshash = hashlib.sha256(str(guess).encode()).hexdigest()
    print(guesshash + "\n" + str(guess))
print("gotem")
data= {
    "num":guess,
    "message":message
    }
requests.get("https://urlordjames.ga/noobchain/contribute.php", data)
