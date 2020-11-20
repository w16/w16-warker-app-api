<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;

class PostoTest extends TestCase
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
     * Testing Authentication in Post request to Post Model
     *
     * @return \Illuminate\Http\Response
     */
    /** @test */
    public function check_if_posto_is_stored_with_middleware()
    {
        $cidade = \App\Models\Cidade::latest()->first();
        $data = [
            "cidade_id"=>$cidade['id'],
            "reservatorio"=>"50",
        
            "longitude"=>"22.521255",
            "latitude" =>"-42.2521253"
          
        ];
       
        
        $response = $this->json("POST","api/posto/",$data);
        $response->assertStatus(401);
        $response->assertSeeText("Acesso negado!");
        
    }
    /**
     * Teste para inserção Autenticada de uma Posto
     * 
     * @return \Illuminate\Http\Response
     */
    /** @test */
    public function check_if_posto_is_stored()
    {
        $cidade = \App\Models\Cidade::latest()->first();
        $data = [
            "cidade_id"=>$cidade['id'],
            "reservatorio"=>"50",
        
            "longitude"=>"22.521255",
            "latitude" =>"-42.2521253"
           
        ];

        Sanctum::actingAs(\App\Models\User::factory()->create(),['*']);
        $response = $this->json('POST','/api/posto/',$data);
        $response->assertSuccessful();
        $this->assertDatabaseHas('postos',$data);
    }
    /**
     * Teste de autenticação para Retornar dados de Postos sem autenticação
     * 
     * @return \Illuminate\Http\Response
     */
    /** @test */
    public function check_if_postos_are_retrieved_withou_middleware()
    {

        $response = $this->json('GET','/api/posto');
        $response->assertStatus(401);
        $response->assertSeeText("Acesso negado!");
    }
    /**
     * Teste de autenticação para Retornar dados de Postos
     * No formato desejado
     * 
     * @return \Illuminate\Http\Response
     */
    /** @test */
    public function check_if_postos_are_retrieved()
    {
  
        Sanctum::actingAs(\App\Models\User::factory()->create());
        $this->withoutExceptionHandling();
   
       
        $response = $this->json('GET','/api/posto');
        
        $response->assertSuccessful();
        $response->assertJsonStructure([
                    "data"=>[
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
        ]);
    }
    /** 
     * Teste para retornar uma postos individual sem autenticação
     * 
     * @return \Illuminate\Http\Response
     */
    /** @test */
    public function check_if_show_retrieves_data_without_middleware()
    {

        $response = $this->json('GET','api/posto/1');
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
            $posto = \App\Models\Posto::latest()->first();
            $response = $this->json('GET','/api/posto/'.$posto['id']);
            
            $response->assertSuccessful();
            $response->assertJsonStructure([                     
                                'id',
                                'reservatorio',
                                'coords'=>[
                                    'latitude',
                                    'longitude'
                                ],
                                
                                'updated_at',
                                'created_at'
            ]);
        }
        /** 
         * Testar se as atualização são realizadas sem autenticação
         * 
         * @return \Illuminate\Http\Response
         */
        /** @test */
        public function check_if_postos_are_updated_without_middleware()
        {
            $cidade = \App\Models\Cidade::latest()->first();
            $data = [
                "reservatorio"=>"50",
                "longitude"=>"22.521255",
                "latitude" =>"-42.2521253"
               
            ];
            $posto = \App\Models\Posto::latest()->first();
            $response = $this->json("PUT","api/posto/".$posto['id'],$data);
            $response->assertStatus(401);
            $response->assertSeeText("Acesso negado!");
            
        }
        /**
         * Testar se as atualização são realizadas 
         * 
         * @return \Illuminate\Http\Response
         */
           /** @test */
           public function check_if_postos_are_updated()
           {

            Sanctum::actingAs(\App\Models\User::factory()->create());
            $cidade = \App\Models\Cidade::latest()->first();
            $data = [
                "reservatorio"=>"50",
                "longitude"=>"22.521255",
                "latitude" =>"-42.2521253"
            
            ];
            $posto = \App\Models\Posto::latest()->first();
            $response = $this->json("PUT","api/posto/".$posto['id'],$data);
            $response->assertSuccessful();
            $this->assertDatabaseHas('postos',$data);
            
        }
        /**
         * Testar se chamando com método incorreto será tratado a exceção
         * 
         * @return \Illuminate\Http\Response
         */
        /** @test */
        public function check_method_not_allowed_in_get()
        {

            $response = $this->json('POST','api/posto/1');
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
            $posto = \App\Models\Posto::latest()->first();
            
            $response = $this->json('DELETE','api/posto/'.$posto['id']);
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
            $posto = \App\Models\Posto::latest()->first();
            $response = $this->json('DELETE','api/posto/'.$posto['id']);
            $response->assertSuccessful();
            $response->assertJsonStructure([
                "Message"
            ]);
        }
}
