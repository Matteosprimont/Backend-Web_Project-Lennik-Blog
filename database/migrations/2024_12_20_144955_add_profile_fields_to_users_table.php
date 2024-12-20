<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable()->after('name');
            $table->date('birthday')->nullable()->after('username');
            $table->string('profile_photo')->nullable()->after('birthday');
            $table->text('about_me')->nullable()->after('profile_photo');
        });
    }
    
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'birthday', 'profile_photo', 'about_me']);
        });
    }
};
