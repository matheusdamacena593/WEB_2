from django.db import models

class Noticia(models.Model):
    titulo = models.CharField(max_length=100)
    conteudo = models.TextField()
    pub_date = models.DateTimeField('date published')
    autor = models.CharField(max_length=100, blank=True)

    def __str__(self):
        return self.titulo
