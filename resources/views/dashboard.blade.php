@extends('layouts.loja_de_musica')

@section('content')
    <h1>Painel de Controlo</h1>
    <div id="dashboardBox">
        <a href="{{ route('products.index') }}"><p>Ver produtos</p></a>
        @if (Auth::user()->isAdmin)
        <a href="{{ route('products.create') }}"><p>Criar produtos</p></a>
        <a href="{{ route('categories.index') }}"><p>Ver Categorias</p></a>
        <a href="{{ route('categories.create') }}"><p>Criar Categorias</p></a>
        @else
        <a href="{{ route('sales.index') }}"><p>As minhas Compras</p></a>
        @endif
    </div>
@endsection

{{-- 4.5 Outras páginas
O processo aplicado a estas páginas poderá ser aplicado às restantes criadas pelo breeze
(confirm-password, forgot-password, reset-password e verify-email), mas como é
muito semelhante ao demonstrado nas páginas de log --}}
