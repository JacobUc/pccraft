@extends('layouts.app')

@section('title', 'Configurador PC')

@section('content')

<div class="container mx-auto mt-6 mb-6 w-full lg:w-2/3">
    <h1>Configurador PC</h1>


    

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Precio
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900">
                    {{$product->nombre}}
                </th>
                <td class="px-6 py-4">
                    {{$product->precio}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <br><br>

    <table class="w-full text-left border-collapse">
        <thead>
            <tr>
                <th class="border-b p-2">Atributo</th>
                <th class="border-b p-2">Valor</th>
            </tr>
        </thead>
        <tbody id="jsonContent">
            @if ($product->especificacionJSON)
                @foreach (json_decode($product->especificacionJSON, true) as $key => $value)
                    <tr>
                        <td class="border-b p-2">{{ $key }}</td>
                        <td class="border-b p-2">{{ $value }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

</div>

<br>
<br>
<br>


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

        <form action="{{ route('configuradorpc.index') }}" method="POST" id="marcaForm">
            @csrf
            <div class="grid grid-rows-3 justify-center">
                <span class="ustify-center items-center text-gray-600 text-2xl font-medium">Seleccionar Marca:</span>
                <div class="flex justify-center items-center me-4">
                    <input id="red-checkbox" type="checkbox" name="marca[]" value="AMD" class="w-5 h-5 text-red-600 bg-gray-100 border-gray-300 rounded focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" onclick="onlyOne(this)" @checked(in_array('AMD', old('marca', [])))>
                    <label for="red-checkbox" class="ms-2 text-2xl font-medium text-red-700 dark:text-gray-300">AMD</label>
                </div>
                <div class="flex justify-center items-center me-4">
                    <input id="blue-checkbox" type="checkbox" name="marca[]" value="Intel" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" onclick="onlyOne(this)" @checked(in_array('Intel', old('marca', [])))>
                    <label for="blue-checkbox" class="ms-2 text-2xl font-medium text-blue-700 dark:text-gray-300">Intel</label>
                </div>
            </div>
        </form>

        <section class="mt-4 mb-4 flex flex-col justify-center items-center w-full">
            <div>
                <h3 class="font-medium text-1xl text-center">Resultados:</h3>
                <p class="font-medium text-1xl text-center">"AMD"</p>
            </div>
            {{-- Tarjetas de productos --}}
            <div class="grid grid-cols-4 w-full text-center mt-4 mx-4">

                @foreach ($procesadores as $procesador)
                <div class="border-2 mx-3 my-5 border-gray-200 rounded-lg pt-2 pb-5 px-3 font-medium shadow-xl">
                    {{-- Imagen --}}
                    <div class="px-2 flex justify-center">
                        <img class="flex items-center max-h-40" src="{{ asset('storage/' . json_decode($procesador->url_photo, true)[0] ) }}" alt="{{$procesador->name}}">
                    </div>
                    {{-- Info Producto --}}
                    <div>
                        <p class="mt-4 mb-2 leading-relaxed">ZOTAC GAMING NVIDIA GEFORCE RTX 3060</p>
                        <p class="mb-3 text-verde">Tarjeta de Video</p>
                        <p class="mb-3 font-['roboto'] text-lg">MXN $16,000.00</p>
                    </div>
                    <button class="py-2 px-4 bg-azul border border-azul rounded-lg text-white shadow hover:shadow-xl">Seleccionar</button>
                </div>
                @endforeach
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
        <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
        <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
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
          <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
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

