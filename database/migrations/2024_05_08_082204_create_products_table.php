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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->string('image_name');
            $table->string('price');

            $table->softDeletes();
            $table->timestamps();
        });
        // Lip Tint
        DB::table('products')->insert([
            'name' => 'Allura',
            'slug' => 'Allura',
            'description' => 'Quality lip and cheek tint, blending natural ingredients with highly pigmented, smudge-proof color. It is safe for all, from kids to expecting and nursing mothers, offering beauty without compromise.',
            'image_name' => 'Allura.jpg',
            'price' => '69',
        ]);

        DB::table('products')->insert([
            'name' => 'Amber',
            'slug' => 'Amber',
            'description' => 'Quality lip and cheek tint, blending natural ingredients with highly pigmented, smudge-proof color. It is safe for all, from kids to expecting and nursing mothers, offering beauty without compromise.',
            'image_name' => 'Amber.jpg',
            'price' => '69',
        ]);
        
        DB::table('products')->insert([
            'name' => 'BloodyRed',
            'slug' => 'BloodyRed',
            'description' => 'Quality lip and cheek tint, blending natural ingredients with highly pigmented, smudge-proof color. It is safe for all, from kids to expecting and nursing mothers, offering beauty without compromise.',
            'image_name' => 'BloodyRed.jpg',
            'price' => '69',
        ]);
        
        DB::table('products')->insert([
            'name' => 'BrightRed',
            'slug' => 'BrightRed',
            'description' => 'Quality lip and cheek tint, blending natural ingredients with highly pigmented, smudge-proof color. It is safe for all, from kids to expecting and nursing mothers, offering beauty without compromise.',
            'image_name' => 'BrightRed.jpg',
            'price' => '69',
        ]);
        
        DB::table('products')->insert([
            'name' => 'HotPink',
            'slug' => 'HotPink',
            'description' => 'Quality lip and cheek tint, blending natural ingredients with highly pigmented, smudge-proof color. It is safe for all, from kids to expecting and nursing mothers, offering beauty without compromise.',
            'image_name' => 'HotPink.jpg',
            'price' => '69',
        ]);
        
        DB::table('products')->insert([
            'name' => 'Marmalade',
            'slug' => 'Marmalade',
            'description' => 'Quality lip and cheek tint, blending natural ingredients with highly pigmented, smudge-proof color. It is safe for all, from kids to expecting and nursing mothers, offering beauty without compromise.',
            'image_name' => 'Marmalade.jpg',
            'price' => '69',
        ]);
        
        DB::table('products')->insert([
            'name' => 'Vampy',
            'slug' => 'Vampy',
            'description' => 'Quality lip and cheek tint, blending natural ingredients with highly pigmented, smudge-proof color. It is safe for all, from kids to expecting and nursing mothers, offering beauty without compromise.',
            'image_name' => 'Vampy.jpg',
            'price' => '69',
        ]);

        // Perfume

        DB::table('products')->insert([
            'name' => 'BenettonCold',
            'slug' => 'BenettonCold',
            'description' => '25% oil-based perfumes—long-lasting, hypoallergenic, and affordable. Enjoy authentic scents without staining clothes.',
            'image_name' => 'BenettonCold.jpg',
            'price' => '180',
        ]);
        
        DB::table('products')->insert([
            'name' => 'BulgariAmethyst',
            'slug' => 'BulgariAmethyst',
            'description' => '25% oil-based perfumes—long-lasting, hypoallergenic, and affordable. Enjoy authentic scents without staining clothes.',
            'image_name' => 'BulgariAmethyst.jpg',
            'price' => '180',
        ]);
        
        DB::table('products')->insert([
            'name' => 'EnglishPear',
            'slug' => 'EnglishPear',
            'description' => '25% oil-based perfumes—long-lasting, hypoallergenic, and affordable. Enjoy authentic scents without staining clothes.',
            'image_name' => 'EnglishPear.jpg',
            'price' => '180',
        ]);
        
        DB::table('products')->insert([
            'name' => 'FerrariBlack',
            'slug' => 'FerrariBlack',
            'description' => '25% oil-based perfumes—long-lasting, hypoallergenic, and affordable. Enjoy authentic scents without staining clothes.',
            'image_name' => 'FerrariBlack.jpg',
            'price' => '180',
        ]);
        
        DB::table('products')->insert([
            'name' => 'KatyPerryMeow',
            'slug' => 'KatyPerryMeow',
            'description' => '25% oil-based perfumes—long-lasting, hypoallergenic, and affordable. Enjoy authentic scents without staining clothes.',
            'image_name' => 'KatyPerryMeow.jpg',
            'price' => '180',
        ]);
        
        DB::table('products')->insert([
            'name' => 'LacosteBlack',
            'slug' => 'LacosteBlack',
            'description' => '25% oil-based perfumes—long-lasting, hypoallergenic, and affordable. Enjoy authentic scents without staining clothes.',
            'image_name' => 'LacosteBlack.jpg',
            'price' => '180',
        ]);
        
        DB::table('products')->insert([
            'name' => 'ParisHilton',
            'slug' => 'ParisHilton',
            'description' => '25% oil-based perfumes—long-lasting, hypoallergenic, and affordable. Enjoy authentic scents without staining clothes.',
            'image_name' => 'ParisHilton.jpg',
            'price' => '180',
        ]);
        
        DB::table('products')->insert([
            'name' => 'PureSeduction',
            'slug' => 'PureSeduction',
            'description' => '25% oil-based perfumes—long-lasting, hypoallergenic, and affordable. Enjoy authentic scents without staining clothes.',
            'image_name' => 'PureSeduction.jpg',
            'price' => '180',
        ]);

        // Hanging Diffuser

        DB::table('products')->insert([
            'name' => 'BrewedCoffee',
            'slug' => 'BrewedCoffee',
            'description' => 'This 10ml hanging diffuser will sure make your car & rooms smells good and refreshing🍃and this is 40% Oil based and each bottle can last from 20 - 30 days🌗',
            'image_name' => 'BrewedCoffee.jpg',
            'price' => '80',
        ]);
        
        DB::table('products')->insert([
            'name' => 'CucumberMelon',
            'slug' => 'CucumberMelon',
            'description' => 'This 10ml hanging diffuser will sure make your car & rooms smells good and refreshing🍃and this is 40% Oil based and each bottle can last from 20 - 30 days🌗',
            'image_name' => 'CucumberMelon.jpg',
            'price' => '80',
        ]);
        
        DB::table('products')->insert([
            'name' => 'FreshBamboo',
            'slug' => 'FreshBamboo',
            'description' => 'This 10ml hanging diffuser will sure make your car & rooms smells good and refreshing🍃and this is 40% Oil based and each bottle can last from 20 - 30 days🌗',
            'image_name' => 'FreshBamboo.jpg',
            'price' => '80',
        ]);
        
        DB::table('products')->insert([
            'name' => 'IrishSpring',
            'slug' => 'IrishSpring',
            'description' => 'This 10ml hanging diffuser will sure make your car & rooms smells good and refreshing🍃and this is 40% Oil based and each bottle can last from 20 - 30 days🌗',
            'image_name' => 'IrishSpring.jpg',
            'price' => '80',
        ]);
        
        DB::table('products')->insert([
            'name' => 'Lavender',
            'slug' => 'Lavender',
            'description' => 'This 10ml hanging diffuser will sure make your car & rooms smells good and refreshing🍃and this is 40% Oil based and each bottle can last from 20 - 30 days🌗',
            'image_name' => 'Lavender.jpg',
            'price' => '80',
        ]);
        
        DB::table('products')->insert([
            'name' => 'Lemon',
            'slug' => 'Lemon',
            'description' => 'This 10ml hanging diffuser will sure make your car & rooms smells good and refreshing🍃and this is 40% Oil based and each bottle can last from 20 - 30 days🌗',
            'image_name' => 'Lemon.jpg',
            'price' => '80',
        ]);
        
        DB::table('products')->insert([
            'name' => 'MarineSquash',
            'slug' => 'MarineSquash',
            'description' => 'This 10ml hanging diffuser will sure make your car & rooms smells good and refreshing🍃and this is 40% Oil based and each bottle can last from 20 - 30 days🌗',
            'image_name' => 'MarineSquash.jpg',
            'price' => '80',
        ]);
        
        DB::table('products')->insert([
            'name' => 'Shangrila',
            'slug' => 'Shangrila',
            'description' => 'This 10ml hanging diffuser will sure make your car & rooms smells good and refreshing🍃and this is 40% Oil based and each bottle can last from 20 - 30 days🌗',
            'image_name' => 'Shangrila.jpg',
            'price' => '80',
        ]);
        
        DB::table('products')->insert([
            'name' => 'Vanilla',
            'slug' => 'Vanilla',
            'description' => 'This 10ml hanging diffuser will sure make your car & rooms smells good and refreshing 🍃 and this is 40% Oil based and each bottle can last from 20 - 30 days 🌗',
            'image_name' => 'Vanilla.jpg',
            'price' => '80',
        ]);

        // Creamy powdery matte tint
        
        DB::table('products')->insert([
            'name' => 'Azhlee',
            'slug' => 'Azhlee',
            'description' => 'Organic matte lipstick—creamy, smudge-proof, and safe for everyone, including kids, pregnant, and lactating moms.',
            'image_name' => 'Azhlee.jpg',
            'price' => '99',
        ]);
        
        DB::table('products')->insert([
            'name' => 'Chantelle',
            'slug' => 'Chantelle',
            'description' => 'Organic matte lipstick—creamy, smudge-proof, and safe for everyone, including kids, pregnant, and lactating moms.',
            'image_name' => 'Chantelle.jpg',
            'price' => '99',
        ]);
        
        DB::table('products')->insert([
            'name' => 'Chloe',
            'slug' => 'Chloe',
            'description' => 'Organic matte lipstick—creamy, smudge-proof, and safe for everyone, including kids, pregnant, and lactating moms.',
            'image_name' => 'Chloe.jpg',
            'price' => '99',
        ]);
        
        DB::table('products')->insert([
            'name' => 'Nushen',
            'slug' => 'Nushen',
            'description' => 'Organic matte lipstick—creamy, smudge-proof, and safe for everyone, including kids, pregnant, and lactating moms.',
            'image_name' => 'Nushen.jpg',
            'price' => '99',
        ]);
        
        DB::table('products')->insert([
            'name' => 'Sabrina',
            'slug' => 'Sabrina',
            'description' => 'Organic matte lipstick—creamy, smudge-proof, and safe for everyone, including kids, pregnant, and lactating moms.',
            'image_name' => 'Sabrina.jpg',
            'price' => '99',
        ]);
        
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
