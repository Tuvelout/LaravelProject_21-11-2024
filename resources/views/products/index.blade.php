@extends('layouts.loja_de_musica')

@section('content')
    {{-- <h1>Produtos</h1> --}}
    <h3>
        <a href="{{ route('products.index') }}"
           @if($idCategoriaAtiva == 0) class="selected" @endif
        >Todos os produtos</a>

        @foreach ($categorias as $categoria)
            <a href="{{ route('categories.products', $categoria->id) }}"
               @if($categoria->id == $idCategoriaAtiva) class="selected" @endif
            >{{ $categoria->Name }}</a>
        @endforeach
    </h3>

    <div id="contentBox">

        @foreach ($produtos as $produto)
            <div class="productBox">
                {{--  --}}
                <div class="productImage">
                    <img src="{{ $produto->img }}">
                </div>
                <div class="productName">
                    <h2> {{ $produto->Name }} </h2>
                </div>
                <div class="productCost">
                    <h2> {{ $produto->Cost }} €</h2>
                </div>
                {{--  --}}
                <div class="productButtons">
                    <a href="{{ route('products.show', $produto->id) }}">
                        <div class="button">
                            Detalhes
                        </div>
                    </a>
                    {{-- <div class="button" >
                        Comprar
                    </div> --}}
                    <div class="button" onclick="submitForm('buy_{{ $produto->id }}')">
                        <form id="buy_{{ $produto->id }}" action="{{ route('sales.store', $produto->id) }}" method="POST">
                            @csrf
                        </form>
                        Comprar
                    </div>
                </div>
                {{--Si ne commentez pas, tous les produits disparaissent. --}}
                @auth
                    @if(Auth::user()->isAdmin)
                        <div class="deleteButton" onclick="submitForm('delete_{{ $produto->id }}')"
                             title="Eliminar {{ $produto->Name }}">
                            <img src="/img/delete.svg">
                            <form id="delete_{{ $produto->id }}" action="{{ route('products.destroy', $produto->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                        <a href="{{ route('products.edit', $produto->id) }}">
                            <div class="editButton" title="Éditer {{ $produto->Name }}">
                                <img src="/img/edit.svg">
                            </div>
                        </a>
                    @endif
                @endauth
            </div>
        @endforeach
    </div>
@endsection
