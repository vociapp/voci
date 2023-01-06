from django.shortcuts import render
from rest_framework import generics
from .serializers import DeckSerializer
from .models import Deck

# Create your views here.
class DeckView(generics.ListAPIView):
    queryset = Deck.objects.all()
    serializer_class = DeckSerializer