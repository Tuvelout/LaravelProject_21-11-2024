@extends('layouts.loja_de_musica')

@section('content')
    @isset($produto)
        <h1>Editar Produto {{ $produto->Name }}</h1>
    @else
        <h1>Criar Produto</h1>
    @endisset
    <div id="createProductBox">
        {{-- <h1>Criar Produto</h1> --}}
        {{-- action="{{ route('products.store') }}"
        c'était à l'intérieur du <form> --}}
        <form id="createProductForm" method="POST"
            @isset($produto)
                action="{{ route('products.update', $produto->id) }}"
            @else
                action="{{ route('products.store') }}"
            @endisset
            enctype="multipart/form-data">
            @csrf
            @isset($produto)
                @method('PUT')
            @endisset
            <h1>Nome do Produto</h1>
            <input id="name" name="name" type="text" placeholder="Nome do Produto"
                value="{{ old('name') == null && isset($produto) ? $produto->Name : old('name') }}">
            <h1>Descrição</h1>
            <input id="desc" name="desc" type="text" placeholder="Descrição do Produto"
                value="{{ old('desc') == null && isset($produto) ? $produto->Description : old('desc') }}">
            <h1>Categoria</h1>
            <select id="cat" name="cat" value="{{ old('cat') }}">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{-- @if (old('cat') == $categoria->id) selected --}}
                        @if ((isset($produto) && old('cat') == null && $produto->category_id == $categoria->id) || old('cat') == $categoria->id) selected @endif>
                        {{ $categoria->Name }}
                    </option>
                @endforeach
            </select>

            <h1>Valor</h1>
            <input id="cost" name="cost" type="number" placeholder="Valor do Produto"
                value="{{ old('cost') == null && isset($produto) ? $produto->Cost : old('cost') }}">
            <h1>Imagem</h1>
            <input id="img" name="img" type="file">
        </form>
        
        @isset($produto)
            <div id="editProductImage">
                <img src="{{ $produto->img }}">
                <p>Sélectionne un ficheiro para alterar ou deixe vazio para manter esta imagem</p>
            </div>
        @endisset
        <div class="createProductButtons">
            <a href="{{ route('products.index') }}">
                <div class="button">
                    Voltar
                </div>
            </a>
            <div class="button" onclick="submitForm('createProductForm')">
                Gravar
            </div>
        </div>
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>
@endsection
