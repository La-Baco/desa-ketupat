<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Site Settings
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->default('Desa Ketupat');
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->text('description')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamps();
        });

        // 2. Desa Profiles
        Schema::create('desa_profiles', function (Blueprint $table) {
            $table->id();
            $table->longText('sejarah')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->longText('visi')->nullable();
            $table->longText('misi')->nullable();
            $table->longText('sambutan')->nullable();
            $table->string('foto_kantor')->nullable();
            $table->timestamps();
        });

        // 3. Desa Statistics
        Schema::create('desa_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('value');
            $table->string('unit')->default('Jiwa');
            $table->integer('year')->default(2026);
            $table->string('category')->default('penduduk');
            $table->timestamps();
        });

        // 4. Aparatur Desa
        Schema::create('aparatur_desas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // 5. Berita
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('Umum');
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->string('image')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->string('status')->default('published'); // draft, published
            $table->unsignedBigInteger('views')->default(0);
            $table->timestamps();
        });

        // 6. Agendas
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('event_date');
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('location')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // 7. Potensi
        Schema::create('potensis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category'); // Perikanan, Pertanian, UMKM, Wisata, Kerajinan, Produk Unggulan
            $table->longText('description');
            $table->string('location')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });

        // 8. Galleries
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->date('event_date')->nullable();
            $table->timestamps();
        });

        // 9. Website Visits
        Schema::create('website_visits', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('device_type')->default('desktop'); // mobile, desktop, tablet
            $table->string('browser')->nullable();
            $table->string('operating_system')->nullable();
            $table->string('page_url')->nullable();
            $table->string('page_name')->nullable();
            $table->timestamp('visited_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_visits');
        Schema::dropIfExists('galleries');
        Schema::dropIfExists('potensis');
        Schema::dropIfExists('agendas');
        Schema::dropIfExists('berita');
        Schema::dropIfExists('aparatur_desas');
        Schema::dropIfExists('desa_statistics');
        Schema::dropIfExists('desa_profiles');
        Schema::dropIfExists('site_settings');
    }
};
