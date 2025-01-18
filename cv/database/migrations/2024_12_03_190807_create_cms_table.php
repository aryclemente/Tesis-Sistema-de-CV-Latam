<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Crear tabla de roles
        Schema::create('roles', function (Blueprint $table) {
            $table->id('idroles');
            $table->string('name', 45);
        });

        DB::table('roles')->insert([
            ['name' => 'Admin'],
            ['name' => 'Publisher'],
        ]);

        // Crear tabla de nacionalidades
        Schema::create('nacionalidades', function (Blueprint $table) {
            $table->id('idnacionalidad');
            $table->string('nacionalidad', 45);
        });

        DB::table('nacionalidades')->insert([
            ['nacionalidad' => 'Venezolana'],
            ['nacionalidad' => 'Extranjero'],
        ]);

        // Crear tabla de preguntas
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id('idpregunta');
            $table->string('pregunta', 450);
        });

        DB::table('preguntas')->insert([
            ['pregunta' => '¿Cuál es el nombre de tu primera mascota?'],
            ['pregunta' => '¿Cuál es el nombre de tu primer profesor(a)?'],
            ['pregunta' => '¿Cuál es el nombre de tu escuela primaria?'],
            ['pregunta' => '¿Cuál es el nombre de tu madre de soltera?'],
            ['pregunta' => '¿Cuál es tu película favorita?'],
        ]);

        // Crear tabla de usuarios antes de publications
        Schema::create('users', function (Blueprint $table) {
            $table->id('idusers'); // unsignedBigInteger por defecto
            $table->string('first_name', 45)->nullable();
            $table->string('last_name', 45)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->integer('cedula')->nullable()->unique();
            $table->string('user_name', 45)->nullable()->unique();
            $table->string('address', 45)->nullable();
            $table->string('email', 45)->nullable()->unique();
            $table->string('facebook', 45)->nullable();
            $table->string('instagram', 45)->nullable();
            $table->string('x', 45)->nullable();
            $table->string('tiktok', 45)->nullable();
            $table->text('descripcion')->nullable();
            $table->string('password', 255)->nullable();
            $table->foreignId('nacionalidad_idnacionalidad')
                ->constrained('nacionalidades', 'idnacionalidad')
                ->onDelete('cascade');
            $table->unsignedBigInteger('roles_idroles')->default(2);
            $table->foreign('roles_idroles')
                ->references('idroles')
                ->on('roles')
                ->onDelete('cascade');
        });

        DB::table('users')->insert([
            [
                'first_name' => 'Isaac',
                'last_name' => 'Cattoni',
                'date_of_birth' => '2003-12-31',
                'cedula' => 30551898,
                'user_name' => 'Admin',
                'email' => 'isaac.cattoni@gmail.com',
                'password' => bcrypt('password12345'),
                'nacionalidad_idnacionalidad' => 1,
                'roles_idroles' => 1,
            ],
            [
                'first_name' => 'Arianna',
                'last_name' => 'Clemente',
                'date_of_birth' => '2001-10-09',
                'cedula' => 28304435,
                'user_name' => 'aryc',
                'email' => 'hello.aryc@gmail.com',
                'password' => bcrypt('123456789'),
                'nacionalidad_idnacionalidad' => 2,
                'roles_idroles' => 2,
            ],
        ]);

        Schema::create('publications', function (Blueprint $table) {
            $table->id('idpublications');
            $table->string('title', 45)->nullable();
            $table->text('content')->nullable();
            $table->text('image')->nullable();
            $table->date('fecha_creacion')->nullable();  // Cambié 'date' a 'dateTime'
            $table->date('fecha_publicacion')->nullable();  // Cambié 'date' a 'dateTime'
            $table->text('categoria')->nullable();
            $table->enum('estado', ['publicado', 'borrador', 'programado'])->nullable();
            $table->foreignId('users_idusers')
                  ->constrained('users', 'idusers')
                  ->onDelete('cascade');
        });

        DB::table('publications')->insert([
            [
                'title' => 'Entrenamiento y Preparación para Entrevistas',
                'content' => 'Preparamos a los candidatos para entrevistas de trabajo mediante simulaciones y asesoramiento personalizado, ayudando a que se presenten de manera más efectiva y segura.',
                'fecha_creacion' => '2025-01-11',
                'fecha_publicacion' => '2025-01-11',
                'estado' => 'publicado',
                'categoria' => 'Servicios',
                'users_idusers' => 1,
            ],
            [
                'title' => 'Entrenamiento y Preparación para Entrevistas',
                'content' => 'Preparamos a los candidatos para entrevistas de trabajo mediante simulaciones y asesoramiento personalizado, ayudando a que se presenten de manera más efectiva y segura.',
                'fecha_creacion' => '2025-01-11',
                'fecha_publicacion' => '2025-01-11',
                'estado' => 'publicado',
                'categoria' => 'Servicios',
                'users_idusers' => 1,
            ],
            [
                'title' => 'Conexión con Empleadores Líderes',
                'content' => 'Facilitamos la conexión entre los mejores talentos y las empresas más destacadas, mejorando el proceso de contratación para ambas partes.',
                'fecha_creacion' => '2025-01-11',
                'fecha_publicacion' => '2025-01-11',
                'estado' => 'publicado',
                'categoria' => 'Servicios',
                'users_idusers' => 1,
            ],
            [
                'title' => 'Consultoría en Desarrollo Profesiona',
                'content' => 'Ayudamos a los candidatos a desarrollar sus habilidades y optimizar su perfil profesional para aumentar sus oportunidades en el mercado laboral.',
                'fecha_creacion' => '2025-01-11',
                'fecha_publicacion' => '2025-01-11',
                'estado' => 'publicado',
                'categoria' => 'Servicios',
                'users_idusers' => 1,
            ],
            [
                'title' => 'Nuestra Misión',
                'content' => 'Facilitar el acceso a oportunidades laborales en Latinoamérica, conectando a los profesionales con empresas innovadoras que buscan talento diverso y calificado.',
                'fecha_creacion' => '2025-01-11',
                'fecha_publicacion' => '2025-01-11',
                'estado' => 'publicado',
                'categoria' => 'Sobre Nosotros',
                'users_idusers' => 1,
            ],
            [
                'title' => 'Nuestro Equipo',
                'content' => 'Un equipo multicultural comprometido con mejorar la búsqueda de empleo en Latinoamérica, brindando asesoría, herramientas y una plataforma confiable para todos.',
                'fecha_creacion' => '2025-01-11',
                'fecha_publicacion' => '2025-01-11',
                'estado' => 'publicado',
                'categoria' => 'Sobre Nosotros',
                'users_idusers' => 1,
            ],
            [
                'title' => 'Nuestra Historia',
                'content' => 'Desde nuestra creación, hemos ayudado a miles de latinoamericanos a encontrar empleo, apoyados por tecnología de punta y una red de empresas que valoran la diversidad.',
                'fecha_creacion' => '2025-01-11',
                'fecha_publicacion' => '2025-01-11',
                'estado' => 'publicado',
                'categoria' => 'Sobre Nosotros',
                'users_idusers' => 1,
            ],
            [
                'title' => 'Nuestros Valores',
                'content' => 'La integridad, inclusión, innovación y la accesibilidad son los pilares sobre los cuales construimos nuestras soluciones de empleo.',
                'fecha_creacion' => '2025-01-11',
                'fecha_publicacion' => '2025-01-11',
                'estado' => 'publicado',
                'categoria' => 'Sobre Nosotros',
                'users_idusers' => 1,
            ],
        ]);


        // Crear tabla de sesiones
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->text('payload');
            $table->integer('last_activity')->index();
        });

        // Crear tabla de reseteo de contraseñas
        Schema::create('password_resets', function (Blueprint $table) {
            $table->id();
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
            $table->foreignId('user_id')
                ->constrained('users', 'idusers')
                ->onDelete('cascade');
        });

        // Crear tabla de respuestas
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id('idrespuesta');
            $table->foreignId('users_idusers')
                ->constrained('users', 'idusers')
                ->onDelete('cascade');
            $table->foreignId('preguntas_idpreguntas')
                ->constrained('preguntas', 'idpregunta')
                ->onDelete('cascade');
            $table->string('respuesta');
        });

        // Tabla de comentarios

        Schema::create('comments', function (Blueprint $table) {
            $table->id('idcomments')->nullable();
            $table->string('full_name')->nullable();
            $table->string('correo')->nullable();
            $table->text('coment')->nullable();
            $table->timestamps();

            $table->foreignId('users_idusers')->nullable()
                  ->constrained('users', 'idusers')
                  ->onDelete('cascade');
        });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('publications');
        Schema::dropIfExists('respuestas');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('users');
        Schema::dropIfExists('preguntas');
        Schema::dropIfExists('nacionalidades');
        Schema::dropIfExists('roles');
    }
};
