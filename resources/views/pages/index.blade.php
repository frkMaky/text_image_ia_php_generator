@extends('layout')

@section('content')

        <div class="container">
        
            <section id="prompt_section">
                <form name="prompt_form" action="/realizar-consulta" method="POST">
                    @csrf
                    <fieldset>
                        <label for="prompt_text">Describe el texto que quieres:</label>
                        <textarea name="prompt_text"></textarea>
                    </fieldset>
                    <input type="submit" value="consultar">
                </form>
            </section>
        
            <section id="prompt_response">
                <ul>
                @foreach($respuestas as $respuesta)
                    <li>{{ $respuesta }}</li>
                @endforeach
                </ul>
            </section>
        </div>
        
    @endsection