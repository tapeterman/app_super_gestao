<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = ['cliente_id'];

    public function produtos(){
        /*
            1 param - model do relacionamento.
            2 param - table auxiliar de relacionamento
            3 param - nome da fk mapeada na busca (pedido)
            4 param - nome da fk mapeada pelo model (produto)

        */
        return $this->belongsToMany(Produto::class,'pedidos_produtos')->withPivot('created_at','id');
    }

}
