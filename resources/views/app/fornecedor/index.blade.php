<h3>Fornecedor</h3><br/>



@php
   /* if () {

   } elseif () {

   } else {

   }                                sintaxe padrão php
*/
@endphp


{{-- {{-- sintaxe blade --}}
{{-- @if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Ainda não existem fornecedores cadastrados</h3>
@endif 

{{-- @unless executa se o retorno for falso, é um atalho para condicional inversa --}}

 {{--Fornecedor: {{ $fornecedores[1]['nome'] }} <br/>
 Status: {{ $fornecedores[0]['status'] }} <br/>
@isset($fornecedores[0]['cnpj'])
    CNPJ: {{ $fornecedores[0]['cnpj'] }} <br/>
    @empty($fornecedores[0]['cnpj'])
        -Vazio
    @endempty
@endisset

@if(!($fornecedores[0]['status'] == 'S'))
    Fornecedor Inativo
@endif

@unless($fornecedores[0]['status'] == 'S')
    Fornecedor Inativo
@endunless

{{-- @isset --}}

 {{--@isset($fornecedores)
 {{--{{-- Todo código inserido aqui só será ativo após verificação do isset se a variável existe, evitando assim erros --}}
 {{--@endisset

{{-- @empty --}} 

@isset($fornecedores)
    Fornecedor: {{ $fornecedores[2]['nome'] }}
    <br>
    Status: {{ $fornecedores[2]['status']}}
    <br>
    CNPJ: {{ $fornecedores[2]['cnpj'] ?? 'Dado não foi preenchido'}} 
    <!--
    $variavel testada não estiver definida (isset)
    ou
    $variavel testado possuir valor null
    -->
    <br>
    Telefone: {{ $fornecedores[2]['ddd'] ?? ''}} {{ $fornecedores[2]['telefone'] ?? ''}}
    <br>
    @switch($fornecedores[2]['ddd'])
        @case('11')
            São Paulo - SP
            @break
        @case('32')
            Juiz de Fora - MG
            @break
        @case('85')
            Fortaleza - CE
            @break
        @default
            Estado não identificado
    @endswitch
    <br>
    <hr>
@endisset


{{-- Sintaxe FOR--}}

@isset($fornecedores)

    @for($i = 0; isset($fornecedores[$i]); $i++)
    Fornecedor: {{ $fornecedores[$i]['nome'] }}
    <br>
    Status: {{ $fornecedores[$i]['status']}}
    <br>
    CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Dado não foi preenchido'}} 
    <br>
    Telefone: ({{ $fornecedores[$i]['ddd'] ?? ''}}) {{ $fornecedores[$i]['telefone'] ?? ''}}
    <hr>
    @endfor
@endisset

{{-- Sintaxe WHILE--}}

@isset($fornecedores)

    @php $i= 0 @endphp
    @while(isset($fornecedores[$i]))
       
        Fornecedor: {{ $fornecedores[$i]['nome'] }}
        <br>
        Status: {{ $fornecedores[$i]['status']}}
        <br>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? ''}} 
        <br>
        Telefone: ({{ $fornecedores[$i]['ddd'] ?? ''}}) {{ $fornecedores[$i]['telefone'] ?? ''}}
        @php $i++ @endphp
        
    @endwhile
@endisset

{{-- Sintaxe ForEach--}}

@isset($fornecedores)

   
    @foreach ( $fornecedores as $indice => $fornecedor )
        
    
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status']}}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? ''}} 
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? ''}}) {{ $fornecedor['telefone'] ?? ''}}
     
    @endforeach  
   
@endisset


{{-- Sintaxe ForElse--}}

@isset($fornecedores)

   
    @forelse ( $fornecedores as $indice => $fornecedor )
        
        Iteração Atual: {{ $loop->iteration}}
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status']}}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? ''}} 
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? ''}}) {{ $fornecedor['telefone'] ?? ''}}
     
    @empty
        Não existem fornecedores cadastrados!!
    @endforelse 
   
@endisset