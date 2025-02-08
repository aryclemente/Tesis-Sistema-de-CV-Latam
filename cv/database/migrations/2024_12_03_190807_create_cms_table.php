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
            $table->id();
            $table->string('name', 45);
        });

        DB::table('roles')->insert([
            ['name' => 'Admin'],
            ['name' => 'Vacante'],
        ]);

        // Crear tabla de nacionalidades
        Schema::create('nacionalidades', function (Blueprint $table) {
            $table->id();
            $table->string('nacionalidad', 45);
        });

        DB::table('nacionalidades')->insert([
            ['nacionalidad' => 'Venezolana'],
            ['nacionalidad' => 'Extranjero'],
        ]);

        // Crear tabla de estados
        Schema::create('estados', function (Blueprint $table) {
            $table->id();
            $table->string('estado', 45);
            $table->string('iso_3166_2', 45);
        });

        // Crear tabla de ciudades
        Schema::create('ciudades', function (Blueprint $table) {
            $table->id();
            $table->string('ciudad', 45);
            $table->boolean('capital');
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')
                ->references('id')
                ->on('estados')
                ->onDelete('cascade');
        });

        Schema::create('municipios', function (Blueprint $table) {
            $table->id();
            $table->string('municipio', 45);
            $table->unsignedBigInteger('estado_id');
            $table->foreign('estado_id')
                ->references('id')
                ->on('estados')
                ->onDelete('cascade');
        });

        Schema::create('parroquias', function (Blueprint $table) {
            $table->id();
            $table->string('parroquia', 45);
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id')
                ->references('id')
                ->on('municipios')
                ->onDelete('cascade');
        });

        Schema::create('experiencias_laborales', function (Blueprint $table) {
            $table->id();
            $table->string('empresa', 45);
            $table->string('cargo', 45);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->timestamps();
        });

        Schema::create('habilidades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_habilidad', 45);
            $table->timestamps();
        });

        Schema::create('experiencia_laboral_habilidad', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('experiencia_laboral_id');
            $table->foreign('experiencia_laboral_id')
                ->references('id')
                ->on('experiencias_laborales')
                ->onDelete('cascade');

            // Clave foránea a 'habilidades'
            $table->unsignedBigInteger('habilidad_id');
            $table->foreign('habilidad_id')
                ->references('id')
                ->on('habilidades')
                ->onDelete('cascade');

            $table->timestamps();
        });

       // Crear tabla de usuarios
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 45)->nullable();
            $table->string('last_name', 45)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->bigInteger('cedula')->nullable()->unique();
            $table->string('user_name', 45)->nullable()->unique();
            $table->string('email', 45)->nullable()->unique();
            $table->string('password', 255)->nullable();
            $table->enum('genero', ['masculino', 'femenino'])->nullable();
            $table->foreignId('nacionalidad_id')
                ->constrained('nacionalidades')
                ->onDelete('cascade');
            $table->foreignId('role_id')->default(2)
                ->constrained('roles')
                ->onDelete('cascade');
            $table->foreignId('ciudad_id')->nullable()
                ->constrained('ciudades')
                ->onDelete('cascade');
            $table->foreignId('experiencia_laboral_id')->nullable()
                ->constrained('experiencias_laborales')
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
                'genero' => 'masculino',
                'nacionalidad_id' => 1,
                'role_id' => 1,
            ],
            [
                'first_name' => 'Arianna',
                'last_name' => 'Clemente',
                'date_of_birth' => '2001-10-09',
                'cedula' => 28304435,
                'user_name' => 'aryc',
                'email' => 'hello.aryc@gmail.com',
                'password' => bcrypt('123456789'),
                'genero' => 'femenino',
                'nacionalidad_id' => 2,
                'role_id' => 2,
            ],
        ]);

        // Crear tabla de certificaciones
        Schema::create('certificaciones', function (Blueprint $table) {
            $table->id();
            $table->string('institucion', 45)->nullable();
            $table->string('nombre_institucion')->nullable();
            $table->date('fecha_expedicion')->nullable();
            $table->unsignedBigInteger('user_id')
            ->nullable();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('set null');
        });

        Schema::create('menciones', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_mencion', 45);
        });

        Schema::create('niveles_academicos', function (Blueprint $table) {
            $table->id();
            $table->string('nivel_academico', 45);
        });

        // Crear tabla de estudios (mover esta parte después de 'niveles_academicos')
        Schema::create('estudios', function (Blueprint $table) {
            $table->id();
            $table->string('estudios_logrados', 45);
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedBigInteger('nivel_academico_id');
            $table->foreign('nivel_academico_id')
                ->references('id')
                ->on('niveles_academicos')
                ->onDelete('cascade');
            $table->unsignedBigInteger('mencion_id');
            $table->foreign('mencion_id')
                ->references('id')
                ->on('menciones')
                ->onDelete('cascade');
        });

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
                ->constrained('users')
                ->onDelete('cascade');
        });

        // Crear tabla de preguntas
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->string('pregunta', 450);
        });

        DB::table('preguntas')->insert([
            ['pregunta' => '¿Cuál es el nombre de tu primera mascota?'],
            ['pregunta' => '¿Cuál es el nombre de tu primer profesor(a)?'],
            ['pregunta' => '¿Cuál es el nombre de tu escuela primaria?'],
            ['pregunta' => '¿Cuál es el nombre de tu madre de soltera?'],
            ['pregunta' => '¿Cuál es tu película favorita?'],
        ]);

        // Crear tabla de respuestas
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignId('pregunta_id')
                ->constrained('preguntas')
                ->onDelete('cascade');
            $table->string('respuesta');
        });

        Schema::create('idiomas', function (Blueprint $table) {
            $table->id();
            $table->string('idioma', 45);
            $table->string('nivel', 45);
        });

        Schema::create('user_idiomas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignId('idioma_id')
                ->constrained('idiomas')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudios');
        Schema::dropIfExists('user_idiomas');
        Schema::dropIfExists('idiomas');
        Schema::dropIfExists('certificaciones');
        Schema::dropIfExists('respuestas');
        Schema::dropIfExists('preguntas');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('users');
        Schema::dropIfExists('nacionalidades');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('ciudades');
        Schema::dropIfExists('estados');
        Schema::dropIfExists('municipios');
        Schema::dropIfExists('parroquias');
        Schema::dropIfExists('experiencias_laborales_habilidades');
        Schema::dropIfExists('experiencias_laborales');
        Schema::dropIfExists('habilidades');
        Schema::dropIfExists('menciones');
        Schema::dropIfExists('niveles_academicos');
    }
};
