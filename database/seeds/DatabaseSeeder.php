<?php

use Illuminate\Database\Seeder;
use App\Movie;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        self::seedCatalog();
        self::seedUsers();
        $this->command->info('¡Tabla inicializada con datos de peliculas!');
        $this->command->info('¡Tabla usuarios con datos de peliculas!');
        $this->call(CatalogTableSeeder::class);
    }
    public function seedCatalog(){
        DB::table('movies')->delete();
        foreach ($this->arrayPeliculas as $pelicula) {
          $p = new Movie;
          $p->title = $pelicula['title'];
          $p->year = $pelicula['year'];
          $p->director = $pelicula['director'];
          $p->poster = $pelicula['poster'];
          $p->rented = $pelicula['rented'];
          $p->synopsis = $pelicula['synopsis'];
          $p->save();
        }
    }
}
