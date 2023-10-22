<x-layout title="Adicionar..">

<form action="/lista/store" method="post">
    @csrf
    @method('POST')

    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome">

    <button type="submit">Enviar</button>
</form>

</x-layout>
