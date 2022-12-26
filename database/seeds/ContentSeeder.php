<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** Home  */
        Content::create([
            'section_id'=> 1,
            'order'     => 'AA',
            'image'     => 'images/home/Group3698.png',
            'content_1' => 'MESAS VIBRADORAS',
            'content_2' => 'Y otros accesorios fabricados para vibrado de premoldeados..'
        ]);

        Content::create([
            'section_id'=> 2,
            'image'     => 'images/home/Rectangle3267.png',
            'content_1' => 'NUESTRA EMPRESA',
            'content_2' => '<p>Somos una empresa familiar que se inició en el año 2007 como un pequeño negocio. Poco a poco fuimos creciendo, adquirimos maquinaria y creamos nuestros propios diseños de productos.
            </p>',
        ]);
        
        /** Empresa */
        Content::create([
            'section_id'=> 3,
            'image'     => 'images/company/Rectangle3267.png',
            'content_1' => 'NUESTRA EMPRESA',
            'content_2' => '<p>Somos una empresa familiar que se inició en el año 2007 como un pequeño negocio. Poco a poco fuimos creciendo, adquirimos maquinaria y creamos nuestros propios diseños de productos.</p>
            <p>Enfocándonos siempre en brindar la mejor atención y asesoramiento a quienes buscaban comenzar con un microemprendimiento, tal como fueron nuestros inicios, es que hoy continuamos desarrollándonos como empresa y seguimos creciendo día a día junto a nuestros clientes.</p>',
        ]);

        Content::create([
            'section_id'=> 4,
            'order'     => 'A1',
            'image'     => 'images/company/noun-quality-3320903.png',
            'content_1' => 'Calidad',
            'content_2' => '<p>Ofrecemos productos de excelente calidad y nos destacamos en la atención al cliente, buscando mejorar continuamente todos nuestros procesos.</p>',
        ]);

        Content::create([
            'section_id'=> 4,
            'order'     => 'A2',
            'image'     => 'images/company/Handshake.png',
            'content_1' => 'confianza',
            'content_2' => '<p>Para nosotros es primordial generar un vínculo de confianza mutua con nuestros clientes, brindándoles todo el conocimiento técnico y atención personalizada tanto en la preventa como en la posventa.</p>',
        ]);

        Content::create([
            'section_id'=> 4,
            'order'     => 'A3',
            'image'     => 'images/company/Recurso42.png',
            'content_1' => 'calidez',
            'content_2' => '<p>Tratamos a nuestros clientes con la misma calidez con la que nos manejamos como familia. Nos define nuestra integridad y autenticidad en las relaciones comerciales.</p>',
        ]);

        Content::create([
            'section_id'=> 5,
            'order'     => 'A1',
            'image'     => 'images/news/image1.png',
            'content_1' => 'Nuevos modelos de lozas y colores disponibles',
            'content_2' => '<p>Conocé sobre nuestros nuevos modelos...</p>',
            'content_3' => 'Pisos',
        ]);


        Content::create([
            'section_id'=> 5,
            'order'     => 'A2',
            'image'     => 'images/news/image2.png',
            'content_1' => 'Te mostramos aplicaciones de revestimientos',
            'content_2' => '<p>Algunos de nuetros trabajas realizados...</p>',
            'content_3' => 'Aplicaciones',
        ]);


        Content::create([
            'section_id'=> 5,
            'order'     => 'A3',
            'image'     => 'images/news/image3.png',
            'content_1' => 'Nuestros insumos',
            'content_2' => '<p>Conocé sobre nuestros curadores...</p>',
            'content_3' => 'Insumos',
        ]);

        Content::create([
            'section_id'=> 6,
            'image'     => 'images/downloads/image51.png',
            'image2'     => 'images/downloads/image51copia.png',
            'content_1' => 'Lista de Precio',
            'content_2' => 'Vigente a partir del 1/05/22',
            'content_3' => '<p>Descarga nuestra lista de precios. Los precios son por unidad y pueden ser modificados sin previo aviso.</p>',
        ]);
    }
}






