<?php

namespace Tests\Feature;

use App\Models\Libro;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Support\Carbon;

class LibroApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_puede_obtener_todos_los_libros()
    {
        Libro::create([
            'titulo' => 'Título del primer libro',
            'autor' => 'Autor del primer libro',
            'fecha_publicacion' => Carbon::now()->toDateString(),
            'genero' => 'Género del primer libro',
        ]);
    
        Libro::create([
            'titulo' => 'Título del segundo libro',
            'autor' => 'Autor del segundo libro',
            'fecha_publicacion' => Carbon::now()->toDateString(),
            'genero' => 'Género del segundo libro',
        ]);
    
        Libro::create([
            'titulo' => 'Título del tercer libro',
            'autor' => 'Autor del tercer libro',
            'fecha_publicacion' => Carbon::now()->toDateString(),
            'genero' => 'Género del tercer libro',
        ]);
    
        $response = $this->getJson('/api/libros');
    
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonCount(3);
    }

    public function test_puede_obtener_un_libro()
    {
        $libro = Libro::create([
            'titulo' => 'Título del libro',
            'autor' => 'Autor del libro',
            'fecha_publicacion' => Carbon::now()->toDateString(),
            'genero' => 'Género del libro',
        ]);

        $response = $this->getJson("/api/libros/{$libro->id}");

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson([
                'id' => $libro->id,
                'titulo' => $libro->titulo,
                'autor' => $libro->autor,
                'fecha_publicacion' => $libro->fecha_publicacion,
                'genero' => $libro->genero,
            ]);
    }

    public function test_puede_agregar_un_libro()
    {
        $libroData = [
            'titulo' => 'Nuevo Libro',
            'autor' => 'Autor Nuevo',
            'fecha_publicacion' =>  Carbon::now()->toDateString(),
            'genero' => 'Ficción',
        ];

        $response = $this->postJson('/api/libros', $libroData);

        $response->assertStatus(Response::HTTP_CREATED)
            ->assertJson($libroData);

        $this->assertDatabaseHas('libros', $libroData);
    }

    public function test_puede_editar_un_libro()
    {
        $libro = Libro::create([
            'titulo' => 'Título del libro',
            'autor' => 'Autor del libro',
            'fecha_publicacion' =>  Carbon::now()->toDateString(),
            'genero' => 'Género del libro',
        ]);

        $nuevosDatos = [
            'titulo' => 'Nuevo Título',
            'autor' => 'Nuevo Autor',
            'fecha_publicacion' =>  Carbon::now()->toDateString(),
            'genero' => 'Aventura',
        ];

        $response = $this->putJson("/api/libros/{$libro->id}", $nuevosDatos);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson($nuevosDatos);

        $this->assertDatabaseHas('libros', $nuevosDatos);
    }

    public function test_puede_eliminar_un_libro()
    {
        $libro = Libro::create([
            'titulo' => 'Título del libro',
            'autor' => 'Autor del libro',
            'fecha_publicacion' => Carbon::now()->toDateString(),
            'genero' => 'Género del libro',
        ]);

        $response = $this->deleteJson("/api/libros/{$libro->id}");

        $response->assertStatus(Response::HTTP_OK);

        $this->assertDatabaseMissing('libros', ['id' => $libro->id]);
    }

    public function test_no_puede_agregar_un_libro_sin_campos_requeridos()
    {
        $response = $this->postJson('/api/libros', []);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors(['titulo', 'autor', 'fecha_publicacion', 'genero']);
    }

    public function test_no_puede_editar_un_libro_sin_campos_requeridos()
    {
        $libro = Libro::create([
            'titulo' => 'Título del libro',
            'autor' => 'Autor del libro',
            'fecha_publicacion' => Carbon::now()->toDateString(),
            'genero' => 'Género del libro',
        ]);

        $response = $this->putJson("/api/libros/{$libro->id}", []);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors(['titulo', 'autor', 'fecha_publicacion', 'genero']);
    }
}
