from django.http import HttpResponse
from django.utils import timezone
from django.shortcuts import render, redirect, get_object_or_404
from .models import Noticia

def home(request):
    return HttpResponse("Olá Mundo")

def criar_noticia(request):
    if request.method == 'POST':
        titulo = request.POST['titulo']
        conteudo = request.POST['conteudo']
        autor = request.POST.get('autor', '')
        pub_date = timezone.now()

        Noticia.objects.create(
            titulo=titulo,
            conteudo=conteudo,
            autor=autor,
            pub_date=pub_date
        )
        return redirect('lista_noticias')
    return render(request, 'noticias/form.html')

def editar_noticia(request, id):
    noticia = get_object_or_404(Noticia, pk=id)
    if request.method == 'POST':
        noticia.titulo = request.POST['titulo']
        noticia.conteudo = request.POST['conteudo']
        noticia.autor = request.POST.get('autor', '')
        noticia.save()
        return redirect('lista_noticias')
    return render(request, 'noticias/form.html', {'noticia': noticia})

def deletar_noticia(request, id):
    noticia = get_object_or_404(Noticia, pk=id)

    if request.method == 'POST':
        noticia.delete()
        return redirect('lista_noticias')

    return render(request, 'noticias/confirmar_delete.html', {'noticia': noticia})

def lista_noticias(request):
    noticias = Noticia.objects.all().order_by('-pub_date')  # lista do mais recente para o mais antigo
    return render(request, 'noticias/lista.html', {'noticias': noticias})