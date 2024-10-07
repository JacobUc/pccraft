@extends('layouts.app')

@section('title', 'Configurador PC')

@section('content')

<div class="container mx-auto mt-6 mb-6 w-full lg:w-2/3">

    <!-- Título del carrito -->
  <nav aria-label="breadcrumb" class="mb-8">
      <ol class="breadcrumb flex space-x-2">
          <li class="breadcrumb-item"><a href="/" class="text-2xl font-medium text-blue-600 dark:text-white">Tienda / </a></li>
          <li class="breadcrumb-item active text-2xl font-medium text-gray-900 dark:text-white" aria-current="page">Configurador PC</li>
      </ol>
  </nav>

<div id="accordion-color" data-accordion="collapse" data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
    
    <!-- 1-PROCESADOR -->
    <h2 id="accordion-color-heading-1">
      <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-blue-600 border border-gray-200 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-1" aria-expanded="true" aria-controls="accordion-color-body-1">
        <span></span>
        <span class="text-blue-600 font-medium text-1xl">Procesador</span>
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
        </svg>
      </button>
    </h2>
    <div id="accordion-color-body-1" class="hidden" aria-labelledby="accordion-color-heading-1">
      <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">

        <section class="mt-4 mb-4 flex flex-col justify-center items-center w-full">
            <div>
                <h3 class="font-medium text-1xl text-center">Selecciona un procesador:</h3>
            </div>
            {{-- Tarjetas de productos --}}
            <div class="grid grid-cols-4 w-full text-center mt-4 mx-4">    
              @if(isset($componentesQuery['procesadores']))
                @foreach($componentesQuery['procesadores'] as $procesador)
                <div class="border-2 mx-3 my-5 border-gray-200 rounded-lg pt-2 pb-5 px-3 font-medium shadow-xl">
                    {{-- Imagen --}}
                    <div class="px-2 flex justify-center">
                        <img class="flex items-center max-h-40" src="{{ asset('storage/' . json_decode($procesador->url_photo, true)[0] ) }}" alt="{{$procesador->name}}">
                    </div>
                    {{-- Info Producto --}}
                    <div>
                        <p class="mt-2 mb-2 leading-relaxed">{{$procesador->nombre}}</p>
                        <p class="mt-2 mb-2 text-verde">{{$procesador->category->nombre_categoria}}</p>
                        <p class="mt-2 mb-2 font-['roboto'] font-normal">
                          ${{ (100 - $procesador->descuento) * 0.01 * $procesador->precio }} MXN  {{-- !Calcularlo en el Controlador --}}
                          @if ( $procesador->descuento > 0 )
                              <span class="font-normal shadow-xl text-zinc-400 line-through">${{ $procesador->precio }}</span>
                              <span class="font-['roboto'] font-normal text-base text-red-600 py-1.5 px-1.5 bg-red-200 rounded-xl">-{{ $procesador->descuento }}% </span>
                          @endif
                        </p>
                    </div>
                    <form action="{{route('configuradorpc.seleccionarProcesador')}}" method="POST">
                      @csrf
                      <input type="hidden" name="id" value="{{ $procesador->ID_producto }}">
                      <button class="py-2 px-4 mt-2 mb-2 bg-azul border border-azul rounded-lg text-white shadow hover:shadow-xl">Seleccionar</button>
                    </form>
                </div>
                @endforeach
              @endif
            </div>
        </section>

    </div>


    </div>

    <!-- 2-TARJETA MADRE -->
    <h2 id="accordion-color-heading-2">
      <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-2" aria-expanded="false" aria-controls="accordion-color-body-2">
        <span></span>
        <span class="text-blue-600">Tarjeta Madre</span>
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
        </svg>
      </button>
    </h2>
    <div id="accordion-color-body-2" class="hidden" aria-labelledby="accordion-color-heading-2">
      <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
        <section class="mt-4 mb-4 flex flex-col justify-center items-center w-full">
          <div>
              <h3 class="font-medium text-1xl text-center">Selecciona una tarjeta madre:</h3>
          </div>
          {{-- Tarjetas de productos --}}
          <div class="grid grid-cols-4 w-full text-center mt-4 mx-4">    
              @if(isset($componentesQuery['tarjetaMadres']))
                  @foreach($componentesQuery['tarjetaMadres'] as $tarjetaMadre)
                  <div class="border-2 mx-3 my-5 border-gray-200 rounded-lg pt-2 pb-5 px-3 font-medium shadow-xl">
                      {{-- Imagen --}}
                      <div class="px-2 flex justify-center">
                          <img class="flex items-center max-h-40" src="{{ asset('storage/' . json_decode($tarjetaMadre->url_photo, true)[0] ) }}" alt="{{$tarjetaMadre->name}}">
                      </div>
                      {{-- Info Producto --}}
                      <div>
                          <p class="mt-2 mb-2 leading-relaxed">{{$tarjetaMadre->nombre}}</p>
                          <p class="mt-2 mb-2 text-verde">{{$tarjetaMadre->category->nombre_categoria}}</p>
                          <p class="mt-2 mb-2 font-['roboto'] font-normal">
                            ${{ (100 - $tarjetaMadre->descuento) * 0.01 * $tarjetaMadre->precio }} MXN
                            @if ( $tarjetaMadre->descuento > 0 )
                                <span class="font-normal shadow-xl text-zinc-400 line-through">${{ $tarjetaMadre->precio }}</span>
                                <span class="font-['roboto'] font-normal text-base text-red-600 py-1.5 px-1.5 bg-red-200 rounded-xl">-{{ $tarjetaMadre->descuento }}% </span>
                            @endif
                          </p>
                      </div>
                      <form action="" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $tarjetaMadre->ID_producto }}">
                        <button class="py-2 px-4 mt-2 mb-2 bg-azul border border-azul rounded-lg text-white shadow hover:shadow-xl">Seleccionar</button>
                      </form>
                  </div>
                  @endforeach
              @endif
          </div>
      </section>
      </div>
    </div>

    <!-- 3-MEMORIA RAM -->
    <h2 id="accordion-color-heading-3">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-blue-600 border border-gray-200 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-3" aria-expanded="true" aria-controls="accordion-color-body-3">
          <span></span>
          <span class="text-blue-600">Memoria RAM</span>
          <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
          </svg>
        </button>
    </h2>
    <div id="accordion-color-body-3" class="hidden" aria-labelledby="accordion-color-heading-3">
        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
          <section class="mt-4 mb-4 flex flex-col justify-center items-center w-full">
            <div>
                <h3 class="font-medium text-1xl text-center">Selecciona memoria RAM:</h3>
            </div>
            {{-- Tarjetas de productos --}}
            <div class="grid grid-cols-4 w-full text-center mt-4 mx-4">    
                @if(isset($componentesQuery['memoriasRAM']))
                    @foreach($componentesQuery['memoriasRAM'] as $memoria)
                    <div class="border-2 mx-3 my-5 border-gray-200 rounded-lg pt-2 pb-5 px-3 font-medium shadow-xl">
                        {{-- Imagen --}}
                        <div class="px-2 flex justify-center">
                            <img class="flex items-center max-h-40" src="{{ asset('storage/' . json_decode($memoria->url_photo, true)[0] ) }}" alt="{{$memoria->name}}">
                        </div>
                        {{-- Info Producto --}}
                        <div>
                            <p class="mt-2 mb-2 leading-relaxed">{{$memoria->nombre}}</p>
                            <p class="mt-2 mb-2 text-verde">{{$memoria->category->nombre_categoria}}</p>
                            <p class="mt-2 mb-2 font-['roboto'] font-normal">
                              ${{ (100 - $memoria->descuento) * 0.01 * $memoria->precio }} MXN
                              @if ( $memoria->descuento > 0 )
                                  <span class="font-normal shadow-xl text-zinc-400 line-through">${{ $memoria->precio }}</span>
                                  <span class="font-['roboto'] font-normal text-base text-red-600 py-1.5 px-1.5 bg-red-200 rounded-xl">-{{ $memoria->descuento }}% </span>
                              @endif
                            </p>
                        </div>
                        <form action="" method="POST">
                          @csrf
                          <input type="hidden" name="id" value="{{ $memoria->ID_producto }}">
                          <button class="py-2 px-4 mt-2 mb-2 bg-azul border border-azul rounded-lg text-white shadow hover:shadow-xl">Seleccionar</button>
                        </form>
                    </div>
                    @endforeach
                @endif
            </div>
        </section>
        
        </div>
    </div>

    <!-- 4-DISIPADOR -->
    <h2 id="accordion-color-heading-4">
      <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-4" aria-expanded="false" aria-controls="accordion-color-body-4">
        <span></span>
        <span class="text-blue-600">Disipador</span>
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
        </svg>
      </button>
    </h2>
    <div id="accordion-color-body-4" class="hidden" aria-labelledby="accordion-color-heading-4">
      <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
        <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core components from Flowbite are open source under the MIT license, whereas Tailwind UI is a paid product. Another difference is that Flowbite relies on smaller and standalone components, whereas Tailwind UI offers sections of pages.</p>
        <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both Flowbite, Flowbite Pro, and even Tailwind UI as there is no technical reason stopping you from using the best of two worlds.</p>
        <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
        <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
          <li><a href="https://flowbite.com/pro/" class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite Pro</a></li>
          <li><a href="https://tailwindui.com/" rel="nofollow" class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a></li>
        </ul>
      </div>
    </div>

    <!-- 5-TARJETA DE VIDEO -->
    <h2 id="accordion-color-heading-5">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-blue-600 border border-gray-200 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-5" aria-expanded="true" aria-controls="accordion-color-body-5">
          <span></span>
          <span class="text-blue-600">Tarjeta de Video</span>
          <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
          </svg>
        </button>
    </h2>
    <div id="accordion-color-body-5" class="hidden" aria-labelledby="accordion-color-heading-5">
        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
          <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
        </div>
    </div>

    <!-- 6-ALMACENAMIENTO PRINCIPAL -->
    <h2 id="accordion-color-heading-6">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-blue-600 border border-gray-200 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-6" aria-expanded="true" aria-controls="accordion-color-body-6">
          <span></span>
          <span class="text-blue-600">Almacenamiento Principal</span>
          <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
          </svg>
        </button>
    </h2>
    <div id="accordion-color-body-6" class="hidden" aria-labelledby="accordion-color-heading-6">
        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
          <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
        </div>
    </div>

    <!-- 7-ALMACENAMIENTO SECUNDARIO -->
    <h2 id="accordion-color-heading-7">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-blue-600 border border-gray-200 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-7" aria-expanded="true" aria-controls="accordion-color-body-7">
          <span></span>
          <span class="text-blue-600">Almacenamiento Secundario</span>
          <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
          </svg>
        </button>
    </h2>
    <div id="accordion-color-body-7" class="hidden" aria-labelledby="accordion-color-heading-7">
        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
          <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
        </div>
    </div>

    <!-- 8-GABINETE -->
    <h2 id="accordion-color-heading-8">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-blue-600 border border-gray-200 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-8" aria-expanded="true" aria-controls="accordion-color-body-8">
          <span></span>
          <span class="text-blue-600">Gabinete</span>
          <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
          </svg>
        </button>
    </h2>
    <div id="accordion-color-body-8" class="hidden" aria-labelledby="accordion-color-heading-8">
        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
          <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
        </div>
    </div>

    <!-- 9-FUENTE DE PODER -->
    <h2 id="accordion-color-heading-9">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-blue-600 border border-gray-200 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-9" aria-expanded="true" aria-controls="accordion-color-body-9">
          <span></span>
          <span class="text-blue-600">Fuente de Poder</span>
          <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
          </svg>
        </button>
    </h2>
    <div id="accordion-color-body-9" class="hidden" aria-labelledby="accordion-color-heading-9">
        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
          <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
        </div>
    </div>

    <!-- 10-ENSAMBLE -->
    <h2 id="accordion-color-heading-10">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-blue-600 border border-gray-200 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-10" aria-expanded="true" aria-controls="accordion-color-body-10">
          <span></span>
          <span class="text-blue-600">Ensamble</span>
          <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
          </svg>
        </button>
    </h2>
    <div id="accordion-color-body-10" class="hidden" aria-labelledby="accordion-color-heading-10">
        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
          <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
        </div>
    </div>

</div>
  


</div>

<script>
    function onlyOne(checkbox) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false;
        });
        document.getElementById('marcaForm').submit();
    }


</script>


@endsection

