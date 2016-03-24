<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('cli_id');
            $table->integer('municipio_mun_id')->nullable();
            $table->integer('cliente_tipo_clt_id');
            $table->char('cli_nome',100);
            $table->char('cli_endereco',200);
            $table->char('cli_end_lat',50);
            $table->char('cli_end_lon',50);
            $table->char('cli_end_google', 200);
            $table->char('cli_ativo',1);
            $table->string('cli_cnpj');
            $table->string('cli_razao_social');
            $table->string('cli_responsavel_nome');
            $table->string('cli_responsavel_tel');
            $table->string('cli_responsavel_email');
            $table->string('cli_email_corp');
            $table->string('cli_site');
            $table->string('cli_brasao_img');
            $table->string('cli_observacoes');
            $table->integer('aspec_escritorio_ase_id');
            $table->string('cli_responsavel_funcao');
            $table->string('cli_responsavel_setor');
            $table->date('cli_responsavel_dt_nascimento');
            $table->string('cli_nome_prefeito');
            $table->string('cli_prefeito_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clientes');
    }
}
