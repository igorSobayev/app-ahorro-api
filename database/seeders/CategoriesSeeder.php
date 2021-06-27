<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category = new Category();
        $category->name = "Salud";
        $category->literal_name = "cat_health";
        $category->descr = "Medicamentos, visitas al medico y otros aparatos para ciudar la salud";
        $category->literal_descr = "cat_descr_health";
        $category->img = "fas fa-heart";
        $category->save();

        $category = new Category();
        $category->name = "Transporte";
        $category->literal_name = "cat_transport";
        $category->descr = "Gasolina, billetes de autobus, reparaciones de coche y todo lo relacionado con el transporte.";
        $category->literal_descr = "cat_descr_transport";
        $category->img = "fas fa-car-side";
        $category->save();

        $category = new Category();
        $category->name = "Ropa";
        $category->literal_name = "cat_clothes";
        $category->descr = "Ropa y Calzado.";
        $category->literal_descr = "cat_descr_clothes";
        $category->img = "fas fa-tshirt";
        $category->save();

        $category = new Category();
        $category->name = "Ocio";
        $category->literal_name = "cat_leisure";
        $category->descr = "Comidas fuera, restaurantes y todo lo relacionado con ocio";
        $category->literal_descr = "cat_descr_leisure";
        $category->img = "fas fa-cocktail";
        $category->save();

        $category = new Category();
        $category->name = "Vivienda";
        $category->literal_name = "cat_house";
        $category->descr = "Alquiler, luz, gas y todos los gastos del inmueble";
        $category->literal_descr = "cat_descr_house";
        $category->img = "fas fa-home";
        $category->save();

        $category = new Category();
        $category->name = "Alimentos";
        $category->literal_name = "cat_food";
        $category->descr = "Compras en supermercados y todo lo relacionado con la alimentación básica.";
        $category->literal_descr = "cat_descr_food";
        $category->img = "fas fa-apple-alt";
        $category->save();

        $category = new Category();
        $category->name = "Gastos Hormiga";
        $category->literal_name = "cat_accrued-expenses";
        $category->descr = "Compras pequeñas como un café o una revista de forma ocasional.";
        $category->literal_descr = "cat_descr_accrued-expenses";
        $category->img = "fas fa-bug";
        $category->save();

        $category = new Category();
        $category->name = "Formación";
        $category->literal_name = "cat_training";
        $category->descr = "Cursos, libros de estudio y todo lo relacionado con el aprendizaje.";
        $category->literal_descr = "cat_descr_training";
        $category->img = "fas fa-graduation-cap";
        $category->save();

        $category = new Category();
        $category->name = "Suscripciones";
        $category->literal_name = "cat_subscriptions";
        $category->descr = "Suscripciones recurrentes en el tiempo como Netflix o Spotify.";
        $category->literal_descr = "cat_descr_subscriptions";
        $category->img = "fab fa-spotify";
        $category->save();

        $category = new Category();
        $category->name = "Otros Gastos";
        $category->literal_name = "cat_other-expenses";
        $category->descr = "El resto de gastos que no pueden incluirse en ninguna de las categorias anteriores.";
        $category->literal_descr = "cat_descr_other-expenses";
        $category->img = "fas fa-align-center";
        $category->save();

        $category = new Category();
        $category->name = "Criptomonedas";
        $category->literal_name = "cat_cripto";
        $category->descr = "Compra de diferentes criptomonedas o NFTs.";
        $category->literal_descr = "cat_descr_cripto";
        $category->img = "fab fa-bitcoin";
        $category->save();
    }
}
