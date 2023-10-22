<x-layout title="Atualizando...">

<form action="/lista/update/{{ $lista->id }}" method="get">
    @php
        $nome = $lista->item;
    @endphp
    @isset($nome)
    @method('PUT')
    @endisset

    @csrf
    <label for="nome">Nome</label>
    <input type="text"
    name="nome" id="nome"
    @isset($nome)
    value="{{$nome}}"
    @endisset>

    <button type="submit">Atualizar</button>
</form>

</x-layout>
