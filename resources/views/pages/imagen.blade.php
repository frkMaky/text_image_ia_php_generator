@extends('layout')

@section('content')

        <div class="container">
        
            <section id="prompt_section">
                <form name="prompt_form" action="/imagen" method="POST">
                    @csrf
                    <fieldset>
                        <label for="prompt_text">Describe la imagen que quieres:</label>
                        <textarea name="prompt_text"></textarea>
                    </fieldset>
                    <input type="submit" value="consultar">
                </form>
            </section>
        
            <section id="prompt_response">
                @if ($imagenGenerada != null)
                <img src="{{ $imagenGenerada }}" alt="Imagen Generada">
                @endif
            </section>
        </div>
        
    @endsection