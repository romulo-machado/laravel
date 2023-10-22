<x-layout title="Lista de Compras">

    <a href="/lista/create"> <button> Adicionar</button> </a>
<ol>
    <div>{{$mensagem}}</div>

    @foreach ($listas as $lista)
    <li> {{$lista->item}}

        <a href="/lista/{{ $lista->id }}/edit"><button>Editar</button></a>

        <form action="/lista/destroy/{{ $lista->id }}" method="post">
            @csrf
            @method('DELETE')
            <button>x</button>
        </form>

    </li> <br>
    @endforeach

</ol>
</x-layout>
