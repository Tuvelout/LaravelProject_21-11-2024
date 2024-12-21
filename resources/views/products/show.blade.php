@extends('layouts.loja_de_musica')

@section('content')
    <h1>Detalhes do Produto</h1>

    <div id="detailsBox">
        <div class="productDetailsImage">
            <img src="{{ $produto->img }}">
        </div>
        <div class="productDetailsName">
            <h2> {{ $produto->Name }} </h2>
        </div>
        <div class="productDetailsCategory">
            <p> Categoria: {{ $categoria->Name }} </p>
        </div>
        <div class="productDetailsDescription">
            <p> {{ $produto->Description }} </p>
        </div>
        <div class="productDetailsCost">
            <h2> {{ $produto->Cost }} € </h2>
        </div>
        <div class="productDetailsButtons">
            <a href="{{ route('products.index') }}">
                <div class="button">Voltar</div>
            </a>
            {{-- <div class="button">Comprar</div> --}}
            <div class="button" onclick="submitForm('buy_{{ $produto->id }}')">
                <form id="buy_{{ $produto->id }}" action="{{ route('sales.store', $produto->id) }}" method="POST">
                    @csrf
                </form>
                Comprar
            </div>
        </div>
        {{-- admin part --}}
        @auth
            @if (Auth::user()->isAdmin)
                <div class="deleteButton2" onclick="submitForm('delete_{{ $produto->id }}')" title="Eliminar {{ $produto->Name }}">
                    <img src="/img/delete.svg">
                    <form id="delete_{{ $produto->id }}" action="{{ route('products.destroy', $produto->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                <a href="{{ route('products.edit', $produto->id) }}">
                    <div class="editButton2" title="Editar {{ $produto->Name }}">
                        <img src="/img/edit.svg">
                    </div>
                </a>
            @endif
        @endauth
    </div>
@endsection
