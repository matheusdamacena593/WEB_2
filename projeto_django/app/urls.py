from django.urls import path
from . import views

urlpatterns = [
    path('', views.lista_noticias, name='lista_noticias'),
    path('nova/', views.criar_noticia, name='criar_noticia'),
    path('editar/<int:id>/', views.editar_noticia, name='editar_noticia'),
    path('deletar/<int:id>/', views.deletar_noticia, name='deletar_noticia'),
]