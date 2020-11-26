<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;


class CidadeTest extends TestCase
{   
    /**
     *  Reinicia o Banco de dados para realizar os teste.
     * 
     */
    use RefreshDatabase;
    
    
    public function setUp():void
    {
        /**
         *  Alimentando Banco de Dados.
         */
        parent::setUp();
        $this->seed();
        
        
    }

    /**
     * Alimentando o Banco para iniciar os tests.
     * 
     * @return void
     */
    /** @test */
    public function check_database_count_and_user(){
        parent::setUp();
        $this->assertDatabaseCount('cidades',20);
        $this->assertDatabaseCount('postos',50);
       
    }
   
    /**
     * Testing Authentication in Post request to Cidade Model
     *
     * @return \Illuminate\Http\Response
     */
    /** @test */
    public function check_if_city_is_stored_with_middleware()
    {
        $data = [
            "nome_da_cidade"=>"Fot",
            "longitude"=>"22.521255",
            "latitude" =>"-42.2521253"
            
        ];
        $response = $this->json("POST","api/cidade/",$data);
        $response->assertStatus(401);
        $response->assertSeeText("Acesso negado!");
        
    }
    /**
     * Teste para inserção Autenticada de uma Cidade
     * 
     * @return \Illuminate\Http\Response
     */
    /** @test */
    public function check_if_city_is_stored()
    {
        
        $data = [
            "nome_da_cidade"=>"Fot",
            "longitude"=>"22.521255",
            "latitude" =>"-42.2521253"
            
        ];

        Sanctum::actingAs(\App\Models\User::factory()->create(),['*']);
        $response = $this->json('POST','/api/cidade/', $data);
        $response->assertSuccessful();
        $this->assertDatabaseHas('cidades',$data);
    }
    /**
     * Teste de autenticação para Retornar dados de Cidades sem autenticação
     * 
     * @return \Illuminate\Http\Response
     */
    /** @test */
    public function check_if_cities_are_retrieved_withou_middleware()
    {

        $response = $this->json('GET','/api/cidade');
        $response->assertStatus(401);
        $response->assertSeeText("Acesso negado!");
    }
    /**
     * Teste de autenticação para Retornar dados de Cidades
     * No formato desejado
     * 
     * @return \Illuminate\Http\Response
     */
    /** @test */
    public function check_if_cities_are_retrieved()
    {
  
        Sanctum::actingAs(\App\Models\User::factory()->create());
        $this->withoutExceptionHandling();

        $response = $this->json('GET','/api/cidade');
        $response->assertSuccessful();
        $response->assertJsonStructure([
            'data'=>[
                '*'=>[
                    'id',
                    'cidade',
                    'coords'=>[
                        'latitude',
                        'longitude'
                    ],
                    'postos'=>[
                        '*'=>[
                            'id',
                            'reservatorio',
                            'coords'=>[
                                'latitude',
                                'longitude'
                            ],
                            
                            'updated_at',
                            'created_at'
                        ]
                    ]
                ]
            ]
            
        ]);
    }
    /** 
     * Teste para retornar uma cidade individual sem autenticação
     * 
     * @return \Illuminate\Http\Response
     */
    /** @test */
    public function check_if_show_retrieves_data_without_middleware()
    {

        $response = $this->json('GET','api/cidade/1');
        $response->assertStatus(401);
        $response->assertSee('Acesso negado!');

    }
    /** 
     * Teste para retornar uma cidade individual autenticada
     * No formato desejado
     * 
     * @return \Illuminate\Http\Response
     */
    /** @test */
    public function check_if_show_retrieves_data()
    {
    
            Sanctum::actingAs(\App\Models\User::factory()->create());
            $this->withoutExceptionHandling();
            $cidade = \App\Models\Cidade::latest()->first();
            $response = $this->json('GET','/api/cidade/'.$cidade->id);
            
            $response->assertSuccessful();
            $response->assertJsonStructure([
                
                        'id',
                        'cidade',
                        'coords'=>[
                            'latitude',
                            'longitude'
                        ],
                        'postos'=>[
                            '*' => [
                                'id',
                                'reservatorio',
                                'coords'=>[
                                    'latitude',
                                    'longitude'
                                ],
                                
                                'updated_at',
                                'created_at'
                            ]
                        ]
            
                
            ]);
        }
        /** 
         * Testar se as atualização são realizadas sem autenticação
         * 
         * @return \Illuminate\Http\Response
         */
        /** @test */
        public function check_if_cities_are_updated_without_middleware()
        {
            $data = [
                "nome_da_cidade"=>"Fot",
             
                "longitude"=>"22.521255",
                "latitude" =>"-42.2521253"
               
            ];
            $cidade = \App\Models\Cidade::latest()->first();
            $response = $this->json("PUT","api/cidade/".$cidade['id'],$data);
            $response->assertStatus(401);
            $response->assertSeeText("Acesso negado!");
            
        }
        /**
         * Testar se as atualização são realizadas 
         * 
         * @return \Illuminate\Http\Response
         */
           /** @test */
           public function check_if_cities_are_updated()
           {

            Sanctum::actingAs(\App\Models\User::factory()->create());
            $data = [
                "nome_da_cidade"=>"Fot",
                "longitude"=>"22.521255",
                "latitude" =>"-42.2521253"
                
            ];
            $cidade = \App\Models\Cidade::latest()->first();
            $response = $this->json("PUT","api/cidade/".$cidade['id'],$data);
            $response->assertSuccessful();
            $this->assertDatabaseHas('cidades',$data);
            
        }
        /**
         * Testar se chamando com método incorreto será tratado a exceção
         * 
         * @return \Illuminate\Http\Response
         */
        /** @test */
        public function check_method_not_allowed_in_get()
        {

            $response = $this->json('POST','api/cidade/1');
            $response->assertStatus(405);
            $response->assertSee([
                'message'=>'Método não autorizado para está rota'
            ]);
            
        }
        /** 
         * Testar se a cidade correta é deletada sem autenticação
         * 
         * @return \Illuminate\Http\Response
         */
        /** @test */
        public function check_if_is_deleting_the_correct_item_without_middleware()
        {   
            $cidade = \App\Models\Cidade::latest()->first();
            
            $response = $this->json('DELETE','api/cidade/'.$cidade['id']);
            $response->assertStatus(401);
            $response->assertSeeText("Acesso negado!");
        }
        /**
         * Testar se a cidade correta é deletada
         * 
         * @return \Illuminate\Http\Response
         */
        /** @test */
        public function check_if_is_deleting_the_correct_item()
        {
            Sanctum::actingAs(\App\Models\User::factory()->create());
            $cidade = \App\Models\Cidade::latest()->first();
            $response = $this->json('DELETE','api/cidade/'.$cidade['id']);
            $response->assertSuccessful();
            $response->assertJsonStructure([
                "Message"
            ]);
        }
}


