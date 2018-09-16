import requests
import random
import hashlib
numhash = requests.get("https://urlordjames.ga/noobchain/guesses.bc").text
prevhashes = requests.get("https://urlordjames.ga/noobchain/hashes.bc").text
diff = requests.get("https://urlordjames.ga/noobchain/difficulty.bc").text
print(diff)
guess = 0
guesshash = ""
print(numhash)
message = input("message to send\n")
while not numhash == guesshash:
    guesshash2 = hashlib.sha256(str(guess).encode()).hexdigest() + hashlib.sha256(str(prevhashes).encode()).hexdigest()
    guesshash = hashlib.sha256(str(guesshash2).encode()).hexdigest()
    if guess > int(diff):
        print("something is wrong")
        print(guess)
        print(guesshash)
        exit()
    guess += 1 #random.randint(0, int(diff))
guess -= 1
print("gotem")
print(guess)
print(guesshash)
data= {
    "num":guess,
    "message":message
    }
requests.get("https://urlordjames.ga/noobchain/contribute.php", data)
