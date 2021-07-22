<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="mt-8 text-center font-bold text-8xl text-gray-800">
        Warker
    </div>
    <div class="mt-6 text-center font-bold italic text-2xl text-gray-500">
        A solução para ajudar você a se manter vivo em um mundo caótico... com excelência!
    </div>
    <div class="mt-6 text-gray-500 text-justify">
        Este aplicativo possui ferramentas de anotação e armazenagem de informações sobre postos de combustível espalhados em sua região ou pelo mundo. Foi projetado para você, pobre cidadão, que se encontra em uma realidade caótica repleta de explosões, socos, quebradeira    e muita... poeira (nada contra se você gostar disso tudo também).
    </div>
</div>

<div class="px-12 bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6 text-gray-600">
        <div class="flex items-center">
            <div class="font-semibold">Funcionalidades</div>
        </div>
        <div class="mt-3 flex items-center text-sm font-semibold ">
            <ol class='list-disc list-inside text-justify'>
                <li>Sistema de autenticação</li>
                <li>Operações CRUD para registro de cidades</li>
                <li>Operações CRUD para registro de postos</li>
                <li>API REST</li>
            </ol>
        </div>
    </div>
    <div class="p-6 text-gray-600">
        <div class="flex items-center">
            <div class="font-semibold">Observações</div>
        </div>
        <div class="mt-3 flex items-center text-sm font-semibold ">
            <ol class='list-disc list-inside text-justify'>
                <li>Se você remover uma cidade, você removerá todos os postos vinculados a ela.</li>
                <li>Para utilizar funcionalidades protegidas da API, você precisará ter um token de autorização. Basta enviar uma requisição <b>POST</b> para a endpoint <i>/api/login</i>  com login e senha de uma conta registrada no sistema e aguardar a resposta pelo token de autorização.</li>
                <li>O token de autorização deverá ser incluído no cabeçalho de cada requisição para acessar operações de endpoints protegidas.</li>
            </ol>
        </div>
    </div>
</div>
