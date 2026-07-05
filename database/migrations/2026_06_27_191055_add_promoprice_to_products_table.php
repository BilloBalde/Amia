<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Ajouter les colonnes manquantes pour le frontend e-commerce
            $table->decimal('promo_price', 10, 2)->nullable()->after('price_sale');
            $table->integer('views')->default(0)->after('promo_price');
            $table->boolean('is_featured')->default(false)->after('views');
            $table->boolean('in_stock')->default(true)->after('is_featured');
            
            // Ajouter les colonnes de dimensions si elles n'existent pas déjà
            // (Ces colonnes étaient dans votre cahier des charges initial)
            if (!Schema::hasColumn('products', 'size')) {
                $table->string('size')->nullable()->after('description');
            }
            if (!Schema::hasColumn('products', 'height')) {
                $table->decimal('height', 8, 2)->nullable()->after('size');
            }
            if (!Schema::hasColumn('products', 'width')) {
                $table->decimal('width', 8, 2)->nullable()->after('height');
            }
            if (!Schema::hasColumn('products', 'length')) {
                $table->decimal('length', 8, 2)->nullable()->after('width');
            }
            
            // Ajouter des index pour les performances
            $table->index('rating');
            $table->index('promo_price');
            $table->index('is_featured');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'promo_price',
                'views',
                'is_featured',
                'in_stock',
                'size',
                'height',
                'width',
                'length'
            ]);
        });
    }
};