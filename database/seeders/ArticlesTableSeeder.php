<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::create([
            'title' => 'Hello, World!',
            'content' => 'This is the first article.',
            'is_published' => true,
        ]);
        Article::create([
            'title' => 'Las maravillas del universo',
            'content' => 'Este artículo explora los misterios y las maravillas del universo, desde las estrellas y las galaxias hasta los agujeros negros y la materia oscura. Descubre cómo los científicos estudian el cosmos y lo que han aprendido sobre el origen y el destino del universo.',
            'is_published' => true,
        ]);

        Article::create([
            'title' => 'La revolución de la inteligencia artificial',
            'content' => 'La inteligencia artificial (IA) está transformando el mundo en el que vivimos. En este artículo, analizamos cómo la IA está cambiando industrias enteras, desde la atención médica hasta el transporte, y discutimos las implicaciones éticas y sociales de esta tecnología emergente.',
            'is_published' => true,
        ]);

        Article::create([
            'title' => 'Guía definitiva para el desarrollo web moderno',
            'content' => 'Con el constante avance de las tecnologías web, mantenerse al día puede ser un desafío. Este artículo proporciona una guía completa sobre las herramientas y técnicas más recientes en el desarrollo web, incluyendo frameworks de JavaScript, diseño responsivo y optimización para SEO.',
            'is_published' => false,
        ]);

        Article::create([
            'title' => 'Los secretos de una vida saludable',
            'content' => 'Vivir una vida saludable no es solo cuestión de dieta y ejercicio. En este artículo, exploramos una variedad de hábitos y prácticas que pueden contribuir a tu bienestar general, incluyendo la gestión del estrés, el sueño adecuado y la importancia de mantener relaciones sociales positivas.',
            'is_published' => true,
        ]);

        Article::create([
            'title' => 'Innovaciones en energías renovables',
            'content' => 'La transición hacia fuentes de energía renovable es crucial para combatir el cambio climático. Este artículo analiza las últimas innovaciones en energías renovables, como la solar y la eólica, y cómo estas tecnologías están siendo implementadas en todo el mundo para crear un futuro más sostenible.',
            'is_published' => false,
        ]);

        Article::create([
            'title' => 'El arte de la cocina gourmet',
            'content' => 'La cocina gourmet es una forma de arte que combina ingredientes de alta calidad con técnicas culinarias sofisticadas. En este artículo, exploramos los fundamentos de la cocina gourmet, desde la selección de ingredientes frescos hasta la presentación de platos exquisitos.',
            'is_published' => true,
        ]);

        Article::create([
            'title' => 'Viajes inolvidables por el mundo',
            'content' => 'Viajar es una de las experiencias más enriquecedoras de la vida. En este artículo, te llevamos a un recorrido por destinos exóticos y emocionantes de todo el mundo, desde las playas de Bali hasta las montañas de los Alpes suizos. Descubre los lugares más fascinantes y las aventuras más emocionantes que te esperan en tus próximas vacaciones.',
            'is_published' => true,
        ]);

        Article::create([
            'title' => 'El futuro de la exploración espacial',
            'content' => 'La exploración espacial ha capturado la imaginación de la humanidad durante siglos. En este artículo, analizamos los últimos avances en la exploración espacial, desde las misiones a Marte hasta la búsqueda de vida extraterrestre. Descubre lo que nos depara el futuro de la exploración espacial y cómo la humanidad está preparándose para alcanzar las estrellas.',
            'is_published' => true,
        ]);

        Article::create([
            'title' => 'Los secretos de la longevidad',
            'content' => 'Vivir una vida larga y saludable es un objetivo que muchos de nosotros compartimos. En este artículo, exploramos los secretos de la longevidad, desde la dieta y el ejercicio hasta la importancia de mantenerse mentalmente activo y socialmente conectado. Descubre cómo puedes vivir una vida más larga y saludable siguiendo estos simples consejos.',
            'is_published' => true,
        ]);

        Article::create([
            'title' => 'El renacimiento de la música clásica',
            'content' => 'La música clásica es un género atemporal que ha resistido la prueba del tiempo. En este artículo, exploramos el renacimiento de la música clásica en la era digital, desde las nuevas interpretaciones de las obras maestras clásicas hasta la creación de nuevas composiciones por compositores contemporáneos. Descubre cómo la música clásica sigue siendo relevante en el mundo moderno y cómo está evolucionando para llegar a nuevas audiencias.',
            'is_published' => true,
        ]);

    }
}
