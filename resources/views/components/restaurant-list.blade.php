<div>
    <h3>{{ $title ?? 'Título não informado' }}</h3> {{-- Slot nomeado--}}
    
    <p> {{ $slot ?? 'Nenhum conteúdo' }}</p> {{--Parâmetro slot, já vindo naturalmente no component. Qualquer coisa que eu passar la na view
    vai ser renderizado normalmente--}}
    @dump($restaurant->all())
</div>
