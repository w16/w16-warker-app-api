<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight">
            Novo registro de cidade
        </h2>
    </x-slot>
    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('cidades.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="nome_da_cidade" class="block font-medium text-sm text-gray-700">Nome</label>
                            <input type="text" name="nome_da_cidade" id="nome_da_cidade" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('nome_da_cidade', '') }}" />
                            @error('nome_da_cidade')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="latitude" class="block font-medium text-sm text-gray-700">Latitude (-90º...90º)</label>
                            <input type="number" name="latitude" id="latitude" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('latitude', '') }}" min='-90' max='90' step='0.1'/>
                            @error('latitude')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="longitude" class="block font-medium text-sm text-gray-700">Longitude (-180º...180º)</label>
                            <input type="number" name="longitude" id="longitude" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                value="{{ old('longitude', '') }}" min='-180' max='180' step='0.1'/>
                            @error('longitude')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Salvar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
