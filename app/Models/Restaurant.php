<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    /*
    VERSÃO 8.X. SINTAXE AINDA SUPORTADA NO 9.X

    Accessor: faz alguma modificação no seu atributo ao acessa-lo.
        public function getNameAttribute($value)
        {
            return strtoupper($value);
        }

    Mutator: faz alguma alteração no seu atributo antes de persisti-lo no banco de dados
        public function setNameAttribute($value)
        {
            $this->attributes['name'] =  . 'ok';
        }
    */

    // ---------------------------------- OU ASSIM: -------------------------------------

    /*
    VERSÃO 9.X
    Retorna um objeto Attribute que consegue computar tanto accessors e mutators
    Pode fazer assim, instanciando diretamente o objeto Attribute, onde o primeiro parâmetro é um getter (accessor) e o
    segundo é um setter(mutator)
    public function name(): Attribute
    {
        return new Attribute(
            // accessor
            function($value) {
                return strtoupper($value);
            },
            // mutator
            function($value) {
                return $value . 'ok';
            }
        );
    }
    */
    // ---------------------------------- OU ASSIM: -------------------------------------

    /*
    O objeto Attribute possui dois callables que recebem arrow functions já com os parâmetros que queremos acessar
    ou mudar
    */
    public function name(): Attribute
    {
        return new Attribute(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => $value . ' ok',
        );
    }
}
