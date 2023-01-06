from django.urls import path
from .views import DeckView

urlpatterns = [
    path('', DeckView.as_view())
]