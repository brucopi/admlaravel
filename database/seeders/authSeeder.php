<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class authSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::unprepared('insert into permissions ( name, description) values ("home", "acesso a tela inicial")');
        DB::unprepared('insert into roles ( name, description) values ("Grupo_padrao" , "Grupo para acesso inicial do sistema")');
        DB::unprepared('insert into users (role_id, name,  email, password ) values ("1","admin","admin@email.com.br","$2a$12$HcHEzcTgnSPaTuYw.wAmLutlOQifboA3DpmGWRaP8BtPeHphD5zsO")');
        DB::unprepared('insert into role_user (role_id, user_id) values ("1","1")');
        DB::unprepared('insert into permission_role (permission_id, role_id) values ("1","1")');
       
    }
}
