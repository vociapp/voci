import string
import random
from django.db import models



def generateDeckID():
    length = 5

    while True:
        ID = ''.join(random.choices(string.ascii_uppercase, k=length))

        if Deck.objects.filter(Deck.deckID == ID).count() == 0:
            break
    
    return ID

# Create your models here.
class Deck(models.Model):
    deckName = models.CharField(max_length=30, default="")
    deckID = models.CharField(max_length=5, unique=True)
    deckCreationDate = models.DateTimeField(auto_now_add=True)
