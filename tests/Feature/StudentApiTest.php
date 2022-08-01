<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Student;
use Illuminate\Testing\Fluent\AssertableJson;

class StudentApiTest extends TestCase
{
    var $id = null;
    public function test_ApiRead(){
    	$response = $this->getJson('/api/students?api_token=testtoken');
	$response->assertStatus(200);
	$this->assertEquals($response->getContent(), Student::all()->toJson() );

    }
    public function test_ApiCreate($name = 'testStudent'){
	    $data = [
	    	'name'=> $name,
		'school_id' => 1
	    ];
	    
	    $response = $this->postJson('/api/students?api_token=testtoken', $data);
	    $response->assertStatus(201);
	    $response->assertJson(fn (AssertableJson $json) =>
		    $json->has('id')
		    ->etc()
	    );
	    $this->id = json_decode($response->getContent())->id;
    }
    public function test_ApiUpdate(){
	    $name = 'testStudentUpdate';
	    $this->test_ApiCreate($name);
	    $data = [
	    	'name'=> $name,
	    ];
	    var_dump($this->id);
	    $response = $this->putJson('api/students/'.$this->id.'?api_token=testtoken', $data);
	    $response->assertStatus(200);
	    $response->assertJson(fn (AssertableJson $json) =>
		    $json->where('id', $this->id)
                     ->where('name', $data['name'])
		    ->etc()
	    );
	    
    }
	public function test_ApiDelete(){
	    $this->test_ApiCreate('testStudentDelete');
	    $response = $this->deleteJson('api/students/'.$this->id.'?api_token=testtoken');
	    $response->assertStatus(200);
	    $this->assertIsInt($this->id);
	    $this->assertNull(Student::find($this->id));
    }


}
