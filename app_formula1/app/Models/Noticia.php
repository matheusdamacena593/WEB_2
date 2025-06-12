<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;

class Noticia extends Model
{
    use HasFactory;
    use Searchable;

    protected $table = 'tb_noticias';
    protected $fillable = [
        'titulo',
        'descricao',
        'autor',
        'url',
    ];

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        if($title = $filters['titulo'] ?? false) {
            $query->where('titulo', 'like', "%{$title}%");
        }
        if($description = $filters['descricao'] ?? false) {
            $query->where('descricao', 'like', "%{$description}%");
        }
    }

    public function storeArquivo($arquivo): string
    {
        if ($arquivo) {
            $path = $arquivo->store('arquivos', 'public');
            $this->url = Storage::url($path);
            $this->save();
        }
    }

    public function toSearchableArray(): array
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'descricao' => $this->descricao,
        ];
    }
}
